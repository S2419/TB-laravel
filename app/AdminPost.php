<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPost extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'content', 'user_id',];

    protected $dates = ['created_at','updated_at'];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
