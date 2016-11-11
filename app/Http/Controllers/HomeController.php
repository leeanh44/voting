<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
   /* public function loginPage()
    {
        return View('welcome');
    }
    public function getLoginFacebook($auth=NULL)
    {
        if($auth=='auth') {
            try {
                \Hybrid_Endpoint::process();
            } catch (Exception $e) {
                return Redirect::to("fbAuth");
            }
            return;
        }
        $config= array(
            "base_url" => "http://mywebsites.com/fbAuth/auth",
            "providers" => array (
                "Facebook" => array (
                    "enabled" => true,
                    "keys" => array ( "id" => "331208227255120", "secret" => "5b1168546174629f78a35f34bc87d69e" ),
                    "scope" => "public_profile,email", // optional
                    "display" => "popup" // optional
                )
            )
        );
        $oauth=new \Hybrid_Auth($config);
        $provider=$oauth->authenticate("Facebook");
        $profile=$provider->getUserProfile();
        var_dump($profile);
        echo "FirstName:".$profile->firstName."<br>";
        echo "Email:".$profile->email;
        echo "<br><a href='logout'>Logout</a> ";
    }
    public function logout()
    {
        $oauth=new \Hybrid_Auth(base_path().'/app/config/fb_Auth.php');
        $oauth->logoutAllProviders();
        Session::flush();
        \Auth::logout();
      */  return Redirect::to("login");
    }
}
