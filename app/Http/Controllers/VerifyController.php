<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VerifyController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'to verify')->get();
        return view('admin.verify', compact('users'));
    }
    public function toVerify($id) {
        $user = User::findOrFail($id);
        // Update the user's status
        $user->status = 'verified';
        
        // Save the updated user record
        $user->save();
        return back()->with('success', 'User successfully verified');
    }
    public function account(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Generate a unique filename
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $authUser = Auth::user()->id;
            
            // Find the authenticated user
            $user = User::find($authUser);
        
            // Check if the user already has a supporting file
            if ($user->supporting_file) {
                // Delete the existing file from storage
                Storage::disk('public')->delete($user->supporting_file);
            }
        
            // Store the new file in the 'uploads' directory in the 'public' disk
            $path = $file->storeAs('uploads', $filename, 'public');
            
            // Update the user's supporting_file and status fields
            $user->supporting_file = $path;
            $user->status = 'to verify'; 
            $user->save(); 
        
            return back()->with('success', 'File uploaded and status updated successfully!');
        }        
    }
    
}
