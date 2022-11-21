<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false;


    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
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
}
