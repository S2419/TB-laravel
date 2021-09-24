<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use HasFactory;

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
        return $this ->belongsTo('App\Models\User');
    }
}
