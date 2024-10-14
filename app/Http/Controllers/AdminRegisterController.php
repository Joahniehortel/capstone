<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function register() {
        return view("auth.admin.adminregister");
    }

    public function store(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->email,
            'password' => 'required'
        ], [
            'email.unique' => 'The email is already registered!'
        ]);

        $admin = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => true,
            'status' => 'verified',
        ]);
        Auth::login($admin);
        return redirect()->to('admin/dashboard');
    }
}
