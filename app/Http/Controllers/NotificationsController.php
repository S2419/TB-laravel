<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class NotificationsController extends Controller
{
    use Notifiable;

    public function _construct()
    {
        $this->middleware('auth');
    }


    public function notifications()
    {
        return auth::user()->unreadNotifications()->get();
    }

    public function markAsRead (Request $request)
    {
        auth()->user()->unreadNotifications()->find($request->notification_id)->markAsRead();
        return redirect('Post');
    }


}
