<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewComment;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','body','commentable_type','commentable_id', 'user_id', 'parent_id',
    ];


    /* /**
      * Get the owning comment model.
      */

    /*/**
     * Get the owning commentable model.
     */

    /*public function commentable()
    {
        return $this->morphTo();
    }*/

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }


}
