<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\DatabaseNotification;
class Notification extends DatabaseNotification

{
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')
            ->orderBy('created_at', 'desc');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}

