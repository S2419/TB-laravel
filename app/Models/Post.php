<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;


    /**
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'content', 'user_id',];

    protected $dates = ['created_at','updated_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return array('id' => $array['id'],'title' => $array['title'], 'content' => $array['content']);

    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->whereNull('parent_id');
    }
}
