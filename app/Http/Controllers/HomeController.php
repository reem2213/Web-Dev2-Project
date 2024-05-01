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
        $user = Auth::user(); // Get the authenticated user

        switch ($user->role) {
            case 'admin':
                return view('admindashboard');
            case 'seller':
                return view('sellercategory/mystores'); // Dashboard view for sellers
            case 'buyer':
                return view('Buyer.Home');  // Dashboard view for buyers
            default:
                return view('welcome');        // Default view for other roles
        }
    }
}
