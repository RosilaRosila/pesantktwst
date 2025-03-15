<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil notifikasi yang belum dibaca dan batasi tampilannya, misalnya 5 notifikasi
        $title = "Dashboard";
        $notifications = Auth::user()->unreadNotifications()->limit(5)->get();
        return view('home', compact('notifications', 'title'));
    }

    public function all()
    {
        // Ambil semua notifikasi
        $notifications = Auth::user()->notifications()->paginate(15);
        return view('notifications.all', compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notificationId = $request->input('notification_id');

        if ($notificationId) {
            Auth::user()->unreadNotifications->where('id', $notificationId)->markAsRead();
        }

        return response()->json(['success' => true]);
    }
}
