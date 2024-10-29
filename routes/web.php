<?php

use App\Models\Resident;
use App\Models\Announcement;
use App\Http\Controllers\Chart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OfficialsController;
use App\Http\Controllers\ResidentsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\AdminRegisterController;


Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

// user auth
Route::get('/auth/google',[UserLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback',[UserLoginController::class, 'handleGoogleCallback']);
Route::get('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/login', [UserLoginController::class, 'store'])->name('login.store');

Route::post('/update/{id}', [UserController::class, 'update'])->name('user.profile.update');

Route::get('/email', [UserController::class, 'showForgotPasswordForm'])->name('forgot.password');
Route::post('/email/requestOtp', [UserController::class, 'getOtp'])->name('request.otp');
Route::get('/email/otp', [UserController::class, 'showOtpForm'])->name('otp');
Route::post('/otp/request', [UserController::class, 'verifyOtp'])->name('send.otp');
Route::get('email/reset-password/form', [UserController::class, 'showChangePassForm'])->name('user.showChangePassForm');
Route::post('email/reset-password', [UserController::class, 'changePassword'])->name('user.changePassword');


Route::get('/register', [UserRegisterController::class, 'register'])->name('register');
Route::post('/register', [UserRegisterController::class,'store'])->name('register.store');

Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');
    
Route::get('/home', function() {
    $latestAnnouncements = Announcement::latest()->take(3)->get();
    return view('user.home')->with('latestAnnouncements', $latestAnnouncements);
})->name('home');

Route::get('/', function() {
    $latestAnnouncements = Announcement::latest()->take(3)->get();
    return view('user.home')->with('latestAnnouncements', $latestAnnouncements);
})->name('home');
Route::get('/request', [DocumentController::class, 'index'])->name('user.request');
Route::post('request/{id}', [DocumentController::class, 'documentRequest'])->name('user.request.documentrequest');
Route::post('request/update/{id}', [DocumentController::class, 'documentRequestUpdate'])->name('user.request.documentrequest.update');
Route::delete('/request/destroy/{id}', [RequestController::class, 'destroy'])->name('user.documentRequest.destroy');

Route::middleware('auth')->group(function (){
    Route::get('/complaint', function(){
        $complaint = '';
        return view('user.services.complaint')->with('complaint', $complaint);
    })->name('complaint.form');
});

Route::post('/complaints/store', [ComplaintsController::class, 'submitComplain'])->name('complaint.store');
Route::get('/complaints/edit/{id}', [ComplaintsController::class, 'editComplaintDetails'])->name('complaint.edit.details');
Route::post('/complaints/update/{id}', [ComplaintsController::class, 'updateComplaintDetails'])->name('complaint.update.details');
Route::post('/complaints/destroy/{id}', [ComplaintsController::class, 'destroy'])->name('complaint.destroy');

Route::get('/officials', function(){
    return view('user.official');
});
Route::get('/announcements', [AnnouncementController::class, 'viewIndex'])->name('user.announcements');
Route::get('/map', function(){
    return view('user.map');
});
Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
Route::get('/notification', [UserController::class, 'notification'])->name('user.notification');
Route::post('/notifications/{id}/mark-as-read', [UserController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/about', function(){
    return view('user.about');
})->name('about');
// admin auth
Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::post('/login/store', [AdminLoginController::class, 'store'])->name('admin.login.store');
    Route::get('/register', [AdminRegisterController::class, 'register'])->name('admin.register');
    Route::post('/register/store', [AdminRegisterController::class, 'store'])->name('admin.register.store');
    Route::get('auth/google', [AdminLoginController::class, 'redirectToGoogle'])->name('admin.google.login');
    Route::get('/auth/google/callback',[AdminLoginController::class, 'handleGoogleCallback']);
});
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [Chart::class, 'barChart'])->name('admin.dashboard');
    Route::post('/admin/dashboard/filter', [Chart::class, 'filterDashboardData'])->name('admin.dashboard.filter');
    Route::post('/reset', [AdminController::class, 'changePassword'])->name('admin.changepass');
    Route::get('/request', [RequestController::class, 'index'])->name('admin.request');
    Route::post('/request/update/{id}', [RequestController::class, 'update'])->name('documentRequest.update');
    Route::delete('/request/destroy/{id}', [RequestController::class, 'destroy'])->name('documentRequest.destroy');
    Route::get('/complaints', [ComplaintsController::class, 'index'])->name('admin.complaint');
    Route::put('/complaints/update/{id}', [ComplaintsController::class, 'updateComplaintStatus'])->name('complaint.update');
    Route::get('residents', [ResidentsController::class, 'index'])->name('admin-resident');
    Route::view('/residents/add', 'admin.residents.resident-add' )->name('resident.addpage');
    Route::post('/residents/store', [ResidentsController::class, 'store'])->name('resident.store');
    Route::get("/residents/edit/{id}", [ResidentsController::class, 'edit'])->name('resident.edit');
    Route::post('/residents/update/{resident}', [ResidentsController::class, 'update'])->name('resident.update');
    Route::post('/residents/delete/{resident}', [ResidentsController::class, 'destroy'])->name('resident.destroy');
    Route::get('/residents/pdf/', [ResidentsController::class, 'residentsPdf'])->name('resident.pdf');
    Route::get('/residents/data', function(){
        $residents = Resident::all(); 

        return response()->json(['data' => $residents]);
    });
    Route::get('/message', [MessageController::class, 'index'])->name('admin.message');
    Route::post('/message', [MessageController::class, 'sendSms'])->name('admin.message.sms');
    Route::get('/message/logs', [MessageController::class, 'getAccountInfo'])->name('admin.message.logs');
    Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage'])->name('messages.delete');
    Route::get('/message/view-logs', [MessageController::class, 'getAccountInfoTable'])->name('admin.message.view.logs');
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('admin.announcement');
    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
    Route::post('announcements/store', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    Route::get('announcements/edit/{id}', [AnnouncementController::class, 'edit'])->name('admin.announcement.edit');
    Route::put('announcements/update/{id}', [AnnouncementController::class, 'update'])->name('admin.announcement.update');
    Route::delete('announcements/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcement.destroy');
    Route::get('/document', [DocumentController::class, 'documents'])->name('admin.document');
    Route::post('/document/update/{id}', [DocumentController::class, 'documentUpdate'])->name('admin.document.update');
    Route::post('/document/store', [DocumentController::class, 'store'])->name('admin.document.store');
    Route::delete('/document/delete/{id}', [DocumentController::class, 'destroy'])->name('admin.document.destroy');
    Route::get('/users', [AdminController::class, 'index'])->name('admin.user');
    Route::get('/users/add', [AdminController::class, 'create'])->name('user.create');
    Route::post('/users/store', [AdminController::class, 'store'])->name('user.store');
    Route::get('/users/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
    Route::post('/users/update/{id}', [AdminController::class, 'update'])->name('user.update');
    Route::delete('/users/destroy/{id}', [AdminController::class, 'destroy'])->name('user.destroy');
    Route::get('/official', [OfficialsController::class, 'index'])->name('admin.official');
    Route::get('/official/add/', [OfficialsController::class, 'create'])->name('official.create');
    Route::post('/official/store', [OfficialsController::class, 'store'])->name('official.store');
    Route::get('/official/edit/{id}', [OfficialsController::class, 'edit'])->name('official.edit');
    Route::post('/official/update/{id}', [OfficialsController::class, 'update'])->name('official.update');
    Route::delete('/official/destroy/{id}', [OfficialsController::class, 'destroy'])->name('official.destroy');
    Route::get('/verify', [VerifyController::class, 'index'])->name('admin.verify');
});
Route::post('/verify/store/{id}', [VerifyController::class, 'toVerify'])->name('admin.toVerify.account');
Route::post('/verify/account', [VerifyController::class, 'account'])->name('admin.verify.account');
Route::post('/verify/reject/{id}', [VerifyController::class, 'toReject'])->name('admin.verify-reject');
