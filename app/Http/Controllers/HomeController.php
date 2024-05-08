<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_role = Auth::user()->role;
        $user_id = Auth::user()->id;

        switch ($user_role) {
            case 'admin':
                return redirect()->route('admin');

            case 'seller':
                return redirect('mystore/'.$user_id); // Dashboard view for sellers

            case 'buyer':
                return view('Buyer.Home');  // Dashboard view for buyers
            default:
                Auth::logout();
                return redirect('/home')->with(['oopsss']);
        }

    }
}
