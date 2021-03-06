<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Json;

class TwitterAuthController extends Controller {
    public function redirectToProvider() {
        return Socialite::driver('twitter')->redirect();
    }
    
    public function handleProviderCallback() {
        $user = Socialite::driver('twitter')->user();
        $response =
            "id: " . $user->id
            . "<br/>Nickname: " . $user->nickname
            . "<br/>name: " . $user->name
            . "<br/>Email: " . $user->email
            . "<br/>Avater: <img src='" . $user->avatar . "'>"
            . "<br/><br/>";
        // OAuth Two Providers
        $response .= json_encode($user);
        return $response;
    }
}
