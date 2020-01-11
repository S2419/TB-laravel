<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Followers extends Model
{
    use Notifiable;


    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }


    public function scopeFindUserName($query)
    {
        return $query->join('user', 'User.id', '=', 'Relation.follower_id' );
    }
}
