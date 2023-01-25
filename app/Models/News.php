<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'news';
    protected $guarded = false;
    protected $fillable = ['user_id', 'published', 'title', 'description', 'content', 'news_image'];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    //Favourite--------------------------------------------------------
    public function favourite()
    {
        return $this->morphMany(Favourite::class, 'favouritable');
    }
    //Like-------------------------------------------------------------
    public function like()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    //Dislike----------------------------------------------------------
    public function dislike()
    {
        return $this->morphMany(Dislike::class, 'dislikeable');
    }
    //Comment
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    //Banned reason
    public function banned_reason()
    {
        return $this->morphMany(BannedReason::class, 'banned_reasonable');
    }
}
