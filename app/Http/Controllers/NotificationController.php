<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $old_notifications = auth()->user()->readNotifications;

        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index', [
            'notifications' => auth()->user()->unreadNotifications,
            'old_notifications' => $old_notifications
        ]);
    }
}
