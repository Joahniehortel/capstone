<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\PostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class UserLoginController extends Controller
{
    public function login(Request $request){
        return view("auth.user.login");
    }

    public function store(Request $request){
        $user = $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:6",
        ]);
        
        if(Auth::guard('web')->attempt(['email'=> $user['email'],'password'=> $user['password']])){
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput(); 
        }
    }
    
    public function logout(Request $request){
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();  
        $request->session()->regenerateToken();

        return to_route('login');
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $googleUser->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('home');
        }
    
        $findUserByEmail = User::where('email', $googleUser->email)->first();
        if (!$findUserByEmail) {
            $googleUserAccount = User::create([
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'firstname' => $googleUser->user['given_name'],
                'lastname' => $googleUser->user['family_name'],
                'isAdmin' => 0 
            ]);
    
            Auth::login($googleUserAccount);
    
            return redirect()->route('home')->with('google_account', $googleUserAccount);
        }
    
        return redirect()->route('login')->with('error', 'An account with this email already exists. Please log in using your email and password.');
    }

}
