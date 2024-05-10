<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\Message;
use \Illuminate\Support\Facades\Facade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use App\Models\Group;
use View;
use App\Events\GroupCreated;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // show all groups that User is Follow
    public function index()
    {
        $my_id = Auth::id();
        // select channels that User Subscribe
        $users = DB::select("select groups.id, groups.name 
        from groups inner JOIN  group_participants ON groups.id = group_participants.group_id and group_participants.user_id = " . Auth::id() . "
        where group_participants.user_id = " . Auth::id() . "
        group by groups.id, groups.name");
        return view('Buyer.Events', compact('users'));
    }
    //  get all Channels are in App   
    public function subscribe()
    {
        $groupALL = Group::all();

        return view('group.join', compact('groupALL'));
    }
    // unFollow User a Channel 
    public function remove_user($id)
    {
        $group = Group::find($id);  // find Channel in Group Table
        $my_id = Auth::id();        // current User
        $group->participants()->detach($my_id);  // remove User in group_participants Table
        $messages = Message::where(['from' => $my_id])->first(); // find User in Messages Table according his Id
        if (is_array($messages) || is_object($messages)) {
            foreach ($messages as $value) {
                Message::where(['from' => $my_id])->delete();  // delete all messages of User in Messages Table
            }
        }
        return redirect()->back();
    }

    // get messages of user according find Group     
    public function getMessag1($id)
    {
        $group = Group::find($id);
        if (!$group) {
            return redirect()->back()->with('error', 'Group not found.'); // Handle the error as per your application's requirements
        }

        // Retrieve all messages for the group
        $messages = Message::where('group_id', $id)->with('user')->get();

        return view('messages.index', compact('group', 'messages'));
    }

    public function getMessag($id)
    {
        $my_id = Auth::id();
        $group = Group::find($id);
        if (!$group) {
            return redirect()->back()->with('error', 'Group not found.'); // Or handle the error as per your application's requirements
        }

        // Retrieve all messages for the current user and the group, then update all to 'is_read = 1'
        $messages = Message::where('group_id', $id)
            ->where('user_id', $my_id)
            ->get();

        // Update all messages at once if there are any messages
        if ($messages->isNotEmpty()) {
            Message::where('group_id', $id)
                ->where('user_id', $my_id)
                ->update(['is_read' => 1]);
        }

        return view('messages.index', compact('group', 'messages'));
    }


    public function sendMessage(Request $request)
    {
        Log::info('Received message sending request', ['request' => $request->all()]);
        try {
            $request->validate([
                'message' => 'required',
                'id' => 'required|exists:groups,id'
            ]);

            $group = Group::find($request->id);
            if (!$group) {
                Log::warning('Group not found', ['group_id' => $request->id]);
                return response()->json(['error' => 'Group not found'], 404);
            }

            // Check if the event is closed
            if ($group->event && $group->event->status === 'closed') {
                Log::warning('Event is closed, message not sent');
                return response()->json(['error' => 'Event is closed, message not sent'], 403);
            }

            // Check if the user is a buyer and the event has not started yet
            if (auth()->user()->role == 'buyer' && $group->event && $group->event->status === 'pending') {
                Log::warning('Event has not started yet, message not sent');
                return response()->json(['error' => 'Event has not started yet, message not sent'], 403);
            }

            $productName = '';
            if (auth()->user()->role == 'seller') {
                $product = Product::find($group->product_id);
                if ($product) {
                    $productName = $product->name;
                }
            }

            $fromUserName = Auth::user()->username;
            $fromUserId = Auth::id();
            $message = Message::create([
                'group_id' => $group->id,
                'user_id' => $fromUserId,
                'from' => $fromUserId,
                'name' => $fromUserName,
                'message' => $request->message . ($productName ? ' - Product: ' . $productName : ''), // Append product name if available
                'is_read' => 1,
            ]);

            Log::info('Message created successfully', ['message_id' => $message->id]);
            return response()->json(['message' => 'Message created', 'content' => $message]);
        } catch (QueryException $ex) {
            Log::error('Database query exception', ['error' => $ex->getMessage()]);
            return response()->json(['error' => 'Database error', 'message' => $ex->getMessage()], 500);
        } catch (Exception $ex) {
            Log::error('General exception', ['error' => $ex->getMessage()]);
            return response()->json(['error' => 'Server error', 'message' => $ex->getMessage()], 500);
        }
    }
    

    public function toggleEventStatus(Request $request, $id)
{
    try {
        // Authorize that the user is a seller
        if (auth()->user()->role !== 'seller') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $group = Group::findOrFail($id);

        // Determine the action based on the current status
        if ($group->status === 'open') {
            $group->status = 'closed';
            // Retrieve all messages
            $messages = $group->messages;

            // Find the largest number
            $maxNumber = $messages->reduce(function ($carry, $item) {
                $number = intval(preg_replace('/[^0-9]/', '', $item->message)); // extract number from string
                return max($carry, $number);
            }, 0);

            $message = 'The buyer with the highest offer of ' . $maxNumber . ' won the product.';
        } else {
            $group->status = 'open';
            $message = 'Event opened successfully!';
        }

        $group->save();

        // Redirect with success message and largest number (if any)
        return redirect()->route('events')->with('success', $message);
    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Event not found.');
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while updating the event status.');
    }
}

    
    

    
}
