<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VerifyNotification;
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
        $user->status = 'verified';
        $rejection_reason = '';
        $user->notify(new VerifyNotification($rejection_reason, 'verified'));
        $user->save();
        return back()->with('success', 'User successfully verified');
    }

    public function toReject(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $rejection_reason = $request->input('rejection_reason');
    
        $user->status = 'unverified';
        $user->supporting_file = ''; 

        $user->notify(new VerifyNotification($rejection_reason, 'unverified'));
        $user->save();
    
        return back()->with('success', 'Account verification has been successfully rejected.');
    }
    
    public function account(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,docx|max:2048', // max size 2MB
        ], [
            'image.mimes' => 'The file must be an image, PDF, or DOCX.',
            'image.max' => 'The file size must not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $authUser = Auth::user()->id;
            

            $user = User::find($authUser);

            if ($user->supporting_file) {

                Storage::disk('public')->delete($user->supporting_file);
            }
            $path = $file->storeAs('uploads', $filename, 'public');
            $user->supporting_file = $path;
            $user->status = 'to verify'; 
            $user->save(); 
        
            return back()->with('success', 'File uploaded and status updated successfully!');
        }        
        return back()->with('error', 'File upload failed');
    }   
    
}
