<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'content', 'comment_image', 'parent_id', 'category_id', 'category_advertisement_id'];
    public function commentable()
    {
        return $this->morphTo();
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function replies()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
