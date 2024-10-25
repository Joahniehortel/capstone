<?php

namespace App\Providers;

use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $unread = 0;
            $user = Auth::user();
            $documentRequests = [];
            $notifications = [];
            $complaints = [];
            $user_announcements = [];

            $latest_announcement = Announcement::latest()->first();
            if ($user) {
                $documentRequests = DB::table('document_requests')
                    ->join('users', 'document_requests.user_id', '=', 'users.id')
                    ->where('document_requests.user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->select('document_requests.*', 'users.firstname', 'users.password', 'users.lastname', 'users.email')
                    ->get();
                $notifications = DB::table('notifications')
                    ->where('notifiable_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get()    
                    ->map(function ($notification) {
                        $notification->data = json_decode($notification->data, true); 
                        return $notification;
                });
                $unread = DB::table('notifications')
                    ->where('notifiable_id', Auth::user()->id)
                    ->where('read_at', null)
                    ->count();
                $complaints = DB::table('complaints')
                    ->join('users', 'complaints.user_id', '=', 'users.id') 
                    ->select('complaints.*')
                    ->where('complaints.user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                $user_announcements = Announcement::all();
            }

            $view->with('authUser', $user)
                ->with('documentRequests', $documentRequests)
                ->with('notifications', $notifications)
                ->with('complaints', $complaints)
                ->with('unread', $unread)
                ->with('user_announcements', $user_announcements)
                ->with('latest_announcement', $latest_announcement);
        });
    }
}
