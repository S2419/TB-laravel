<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Broadcast;

=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

<<<<<<< HEAD
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


=======
Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
Broadcast::channel('privateChat.{userId}', function ($user, $userId){
    //return $user->id === $userId;
    return $user->id === User::findOrNew($userId)->user_id;
    //return Auth::check();
});
<<<<<<< HEAD
=======

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
