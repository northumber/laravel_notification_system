<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $notifications = Notifications::where('id_user', Auth::id())
                    ->orderBy('date', 'desc')
                    ->limit(20) // configure the number of maximum notifications to display | default: 20
                    ->get();
                $view->with('globalNotifications', $notifications);
            }
        });
    }

    public function register()
    {
        //
    }
}
