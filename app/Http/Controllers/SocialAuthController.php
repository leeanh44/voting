<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectTwitter($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callbackFacebook(SocialAccountService $service)
    {
        $user = $service->createOrGetUserFacebook(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }
    public function callbackTwitter(SocialAccountService $service, $provider)
	{
	    $user = $service->createOrGetUserTwitter(Socialite::driver($provider));

	    auth()->login($user);

	    return redirect()->to('/home');
	}
    
}