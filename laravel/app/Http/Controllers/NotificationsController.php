<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationsController extends Controller
{
    public function updateNotification(Request $request)
    {
        $notificationId = $request->input('notification_id');
        $notification = Notifications::find($notificationId);
        if ($notification) {
            $notification->read = 1;
            $notification->save();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error'], 404);
    }

}
