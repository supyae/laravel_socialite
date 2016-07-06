<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/twitter');
        }
        dd($user);

//        $authUser = $this->findOrCreateUser($user);
//
//        Auth::login($authUser, true);
//
//        return Redirect::to('home');
    }

    private function findOrCreateUser($twittUser)
    {
        if ($authUser = User::where('twitter_id', $twittUser->id)->first()) {
            return $authUser;
        }
        return User::create([
            'name' => $twittUser->name,
            'email' => $twittUser->email,
            'twitter_id' => $twittUser->id,
            'twitter_token' => $twittUser->token,
            'avatar' => $twittUser->avatar
        ]);
    }
}
