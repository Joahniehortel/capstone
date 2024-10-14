<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AdminLoginController extends Controller
{
    public function login(){
        return view('auth.admin.adminlogin');
    }

    public function store(Request $request){
        $user = $request->validate([
            "email" => "required|email",
            "password" => "required|string|min:6",
        ]);
        
        $checkUser = User::where('email', $user['email'])->first();

        if(!$checkUser == null){
            if($checkUser->isAdmin == 1){
                if(Auth::guard('web')->attempt(['email'=> $user['email'],'password'=> $user['password']])){
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                }else{
                    return back()->withErrors([
                        'email' => 'The provided credentials does not match our records.'
                    ]);
                }
            }else{
                return redirect()->route('admin.login')->with('error', 'Access denied. You do not have permission to access this page.');
            }
        }
        else{
            return redirect()->route('admin.login')->with('error', 'The provided credentials does not match our records.');
        }
    }
    public function logout(Request $request){
        if(Auth::user()->isAdmin == 0){
            Auth::guard('web')->logout();
        
            $request->session()->invalidate();  
            $request->session()->regenerateToken();
    
            return to_route('login');
        }else{
            Auth::guard('web')->logout();
        
            $request->session()->invalidate();  
            $request->session()->regenerateToken();
    
            return to_route('admin.login');
        }
    }

    public function redirectToGoogle(){
        return Socialite::driver(driver: 'google')->redirect();
    }
    public function handleGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();
        dd($googleUser);
        
        $findUser = User::where('google_id', $googleUser->id)->first();
    
        if ($findUser) {
            Auth::login($findUser);
    
            return redirect()->route('home');
        }
    
        $findUserByEmail = User::where('email', $googleUser->email)->first();
    
        if (!$findUserByEmail) {
            $user = User::create([
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'isAdmin' => 1   
            ]);
    
            Auth::login($user);
    
            return redirect()->route('home');
        }
    
        return redirect()->route('admin.login')->with('error', 'An account with this email already exists. Please log in using your email and password.');
    }
    
}
