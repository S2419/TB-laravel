<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
=======
use App\User;
use Illuminate\Notifications\DatabaseNotification;
use App\Comment;
use App\Notifications;
use App\Post;

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

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


<<<<<<< HEAD
=======


>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
}
