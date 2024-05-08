<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        

        try {
            $SocialUser = Socialite::driver($provider)->user();

            $user = User::where([
                'provider_id' => $SocialUser->id,
                'provider' => $provider
            ])->first();
            

            $role = session('role', 'defaultRole');
           
            // Make sure 'defaultRole' is a valid role or handle this case appropriately

            if ($user) {
                Auth::login($user);

                return redirect('/home');
            } else {
                $user = User::create([
                    'username' => User::generateUsername($SocialUser->getNickname() ? $SocialUser->getNickname() :$SocialUser->getName()),
                    'email' => $SocialUser->getEmail(),
                    'provider_token' => $SocialUser->token,
                    'provider_id' => $SocialUser->getId(),
                    'provider' => $provider,
                    'role' => $role,
                ]);
                
            }
            Auth::login($user);

            return redirect('/home');
        } catch (\Exception $e) {


            return dd($e);
        }
    }

 


}
