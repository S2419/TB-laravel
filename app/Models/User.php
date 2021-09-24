<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\DatabaseNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profilepic',
        'user_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      public function post()
    {
        return $this-> hasMany('App\Models\Post');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }


    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')
            ->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
    }


    /**
     * Gets all users which follow this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id')->withTimestamps();
    }


    public function hasNot($user)
    {
        return $this->id !== $user->id;
    }

    public function hasFollowed($user)
    {
        return (bool)$this->following->where('id', $user->id)->count();
    }


    public function canFollow($user)
    {
        if (!$this->hasNot($user)) {
            return false;
        }
        return !$this->hasFollowed($user);
    }

    public function canUnfollow($user)
    {
        return $this->hasFollowed($user);
    }

    public function searchableAs()
    {
        return 'users_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('id' => $array['id'], 'name' => $array['name']);
    }

    public function adminpost()
    {
        return $this-> hasMany('App\AdminPost');
    }


}
