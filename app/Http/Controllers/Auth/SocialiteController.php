<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SocialCheckService;
use App\Http\Controllers\Controller;
use Socialite;

class SocialiteController extends Controller
{
    public function register($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function registered(Request $request, $provider)
    {
        if(isset($request->error))
            return redirect()
                ->to('login');
        try {
            $userProvider = Socialite::driver($provider)->stateless()->user();
            $user = $this->checkUser($userProvider, $provider);
            auth()->login($user);
            return redirect()
                ->to('/home');
            // $user->token;
        } catch (Exception $e) {
            return redirect()
                ->to('login');
        }
    }
}
