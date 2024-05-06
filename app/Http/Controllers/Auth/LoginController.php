<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
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
        } else {
            return redirect('login');
        }
    }
}
