<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable;
    /**
     * Fields that are mass assignable
     *
     * @var array
     */

    protected $fillable = [
        'id', 'user_id', 'user_to', 'message',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this ->belongsTo('App\User');
    }
}
