<?php

namespace App\Http\Controllers;

use App\AuthenticateUser;
use App\Http\Requests;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function login(AuthenticateUser $authenticateUser, Request $request, $provider = null) {
        return $authenticateUser->execute($request->all(), $this, $provider);
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }
}
