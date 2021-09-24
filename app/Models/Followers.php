<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Followers extends Model
{
    use HasFactory;

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
