<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Mail\PostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('user.user-profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'contact_no' => 'required|string|max:12|min:11',
            'current_password' => [
                'nullable',
                'string',
                'min:8',
                function ($attribute, $value, $fail) {
                    if ($value && !Auth::attempt(['email' => Auth::user()->email, 'password' => $value])) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'nullable|string|min:8', 
        ]);

        $user = User::findOrFail($id);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->contact_no = $request->input('contact_no');
        if ($request->input('current_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
        }
        if ($request->input('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.email');
    }
    public function showOtpForm() {
        $userEmail = session('userEmail');
        return view('user.otp-form')->with('userEmail', $userEmail);
    }
    public function showChangePassForm(){
        $user = session('user');
        return view('user.change-password')->with('user', $user);
    }
    public function getOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $userEmail = $request->input('email');
        $user = DB::table('users')->where('email', $userEmail)->first();

        if ($user) {
            $otp = mt_rand(1000, 10000);
            Otp::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(15)
            ]);
            Mail::to($userEmail)->send(new PostMail($otp));
        }
        return view('user.otp-form')
        ->with('userEmail', $userEmail)
        ->with('success', 'OTP has been successfully sent to your registered email address');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|array|size:4', // Validate as an array with 4 elements
            'otp.*' => 'required|numeric', // Each element must be a numeric value
            'email' => 'required|email|exists:users,email',
        ]);

        $userEmail = $request->input('email');
        $otpInput = implode('', $request->input('otp'));

        $user = DB::table('users')->where('email', $userEmail)->first();

        if ($user) {
            $otpRecord = Otp::where('user_id', $user->id)
                ->where('otp', $otpInput)
                ->where('expires_at', '>', Carbon::now()) 
                ->first();
            if ($otpRecord) {
                $otpId = Otp::where('otp_id', $otpRecord->otp_id);
                $otpId->delete();

                return redirect('email/reset-password/form')->with('user', $user);
            } else {
                return back()->withErrors(['otp' => 'Invalid or expired OTP. Please try again.']);
            }
        }

        return back()->withErrors(['email' => 'User not found!']);
    }

    public function changePassword(Request $request)
    {
        $email = 'chansalonoy96@gmail.com';
        $request->validate([
            'newPassword' => 'required|min:8', 
            'confirmPassword' => 'required|same:newPassword'  
        ]);
        
        $user = DB::table('users')->where('email', $email)->first();
        if ($user) {
            $hashedPassword = Hash::make($request->input('newPassword'));

            $response = DB::table('users')->where('email', $request->input('email'))->update([
                'password' => $hashedPassword,
            ]);
            return redirect('/home')->with('success', 'Password changed successfully!');
        } else {
            return back()->withErrors(['error' => 'User not found.']);
        }
    }
    public function notification(){
        return view('user.notification');
    }

    public function markAsRead($id)
    {
        DB::table('notifications')
            ->where('id', $id)
            ->where('notifiable_id', auth()->id()) 
            ->update(['read_at' => now()]); 
    
        return response()->json(['success' => true]);
    }
}