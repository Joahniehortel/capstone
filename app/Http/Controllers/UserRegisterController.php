<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserRegisterController extends Controller
{
    public function register(){
        return view("auth.user.register");
    }

    public function store(Request $request){
        
        $request->validate([
            "firstname" => ["required", "string", "max:255"],
            "lastname" => ["required", "string", "max:255"],
            "contact_no" => ["required", "string", "regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/"], 
            "email" => [
                'required',
                'string',
                'email', 
                'max:255',
                'unique:users,email', 
            ],
            'password' => [
                'required',
                'string',
                'min:8', 
            ],
        ]);
        

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'contact_no' => $request->input('contact_no'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'isAdmin' => false,
        ]);
        Auth::login($user);
        
        return redirect()->to(route('home'));
    }

    public function RegisterRedirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function RegisterHandleGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();

        $findUser = User::where('google_id', $googleUser->id)->first();
        
        if(!$findUser){

            User::create([
                'email' => $googleUser->email,
                'google_id' => $googleUser->id
            ]);
            
            Auth::login($findUser);
            return redirect()->route('login');

        }
        Auth::login($findUser);

        return redirect()->intended('home')->with('email', 'An account with this email already exists. Please use another login method or a different Google account.');
    }
}
