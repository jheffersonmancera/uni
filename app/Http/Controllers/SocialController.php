<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Authenticatable;

class SocialController extends Controller

{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $data = Socialite::driver($provider)->user();
        
        $userconnect = User::where('email', $data->email)->first();

        if ($userconnect) {
            Auth::login($data->email, true);
        }else{   
        $user = new User;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->avatar = $data->getAvatar();
        $user->password = bcrypt($data->email);
        $user->state = 1;
        $user->save();
        }

        $ruta = User::where('email', $data->email);
        return view('layouts.app', compact('userconnect'));
    }

    public function tito($provider)
    {
        

        return 'hola';
    }
}
