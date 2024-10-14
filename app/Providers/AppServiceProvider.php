<?php

namespace App\Providers;

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
            $user = Auth::user();
            $documentRequests = [];
            $notifications = [];
            $complaints = [];

            if ($user) {
                $documentRequests = DB::table('document_requests')
                    ->join('users', 'document_requests.user_id', '=', 'users.id')
                    ->where('document_requests.user_id', $user->id)
                    ->select('document_requests.*', 'users.firstname', 'users.password', 'users.lastname', 'users.email')
                    ->get();
                $notifications = DB::table('notifications')
                    ->where('notifiable_id', $user->id)
                    ->get()    
                    ->map(function ($notification) {
                        // Decode the JSON data as an array
                        $notification->data = json_decode($notification->data, true); 
                        return $notification;
                    });
                $complaints = DB::table('complaints')
                    ->join('users', 'complaints.user_id', '=', 'users.id') 
                    ->select('complaints.*')
                    ->where('complaints.user_id', $user->id)
                    ->get();
            }
            $view->with('authUser', $user)
                ->with('documentRequests', $documentRequests)
                ->with('notifications', $notifications)
                ->with('complaints', $complaints);
        });
    }
}
