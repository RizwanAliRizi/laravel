<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use App\SocialProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        //dd$provider);
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

   //getting 
        $social = new SocialProvider;
        $social->provider= $user->getName();
        $social->provider_id = $user->getId();
        return redirect('register')->with(['email'=> $user->getEmail(),'name'=>$user->getName()]);
        $social->save();
        echo "social provider saved";
        // $user->token;
        dd($user);
        dd("callback");
      
       //  $user->getName();
        // $user->getEmail();
        // $user->getAvatar();
    }

}
