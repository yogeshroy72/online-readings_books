<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);

        // Check if the user exists in your database or create a new user
        // based on the received user details

        // Example: Assuming you have a User model
        // $authUser = User::where('email', $user->getEmail())->first();

        // if (!$authUser) {
        //     $authUser = User::create([
        //         'name' => $user->getName(),
        //         'email' => $user->getEmail(),
        //         'password' => bcrypt('randompassword'),
        //     ]);
        // }

        // login the user
        // auth()->login($authUser, true);

        return redirect('/home');
    }

}
