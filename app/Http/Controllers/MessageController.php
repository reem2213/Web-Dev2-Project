<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Group;

use App\Events\MessageEvent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    //show messages from a group   
    // public function show_messages($id)
    // {
    //     $group = Group::find($id);

    //     $messages = $group->messages()->with(['group', 'user'])->get();

    //     $user_loggedIn = auth()->user();
    //     return view('messages.index', compact(['group', 'messages']));
    //    // return ['messages' => $messages, 'user_loggedIn' => $user_loggedIn];
    // }
    

    public function isread($id)
    {
        $my_id = Auth::id();  
        $messages = Message::where(['user_id' => $my_id])->get();
        foreach($messages as $value) {
            message::where(['user_id' => $my_id])->update(['is_read' => 1]);
            return redirect()->back();
        }
    }

    public function send_message(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        
        $group = Group::find($id);

        // Check if the event is active or pending
        if ($group->event && in_array($group->event->status, ['pending', 'active'])) {
            $message = Message::create([
                'user_id' => auth()->user()->id,
                'group_id' => $id,
                'message' => $request->message,
                'is_read' => 1
            ]);
    
            // Update the group's updated_at timestamp
            $group->update(['updated_at' => $message->updated_at]);
    
            return redirect('/events')->with('success', 'Message sent successfully');
        } else {
            return redirect()->back()->with('error', 'You cannot send messages as the event is closed or not started yet');
        }
      
    }
}