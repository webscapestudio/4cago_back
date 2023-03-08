<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use SoftDeletes;
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false;
    protected $fillable = ['user_id', 'published', 'title', 'category_id', 'content', 'post_image', 'description', 'slug'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}
