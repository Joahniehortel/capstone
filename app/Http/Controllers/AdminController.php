<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.user.user', ['users' => User::all()]);
    }

    public function create()
    {
        return view('admin.user.admin-user-create');
    }
    public function store(Request $request)
    {   
        User::create([
            'image' => $request->input('image'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'contact_no' => $request->input('contact_number'),
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }
    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        return view('admin.user.admin-user-edit', ['user' =>User::findOrFail($id)]);
    }
    public function update(Request $request, string $id)
    {
        User::create([
            'firstname',
            'lastname',
            'email',
            'password',
            'contact_no'
        ]);
    }
    public function destroy(string $id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect('admin/login')->with('success', "User successfully deleted.");
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_pass' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);
    
        // Get the currently authenticated user
        $user = Auth::user();
        // Check if the current password matches
        if (!Hash::check($request->current_pass, $user->password)) {
            return back()->withErrors(['current_pass' => 'Current password is incorrect']);
        }
    
        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password changed successfully!');
    }
}
