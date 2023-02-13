<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'vacancys';
    protected $guarded = false;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    protected $fillable = ['user_id', 'published', 'title', 'category_work_id', 'content', 'work_image', 'description'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category_work()
    {
        return $this->belongsTo(CategoryWork::class, 'category_work_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    //Favourite--------------------------------------------------------
    public function favourite()
    {
        return $this->morphMany(Favourite::class, 'favouritable');
    }
    //Banned reason
    public function banned_reason()
    {
        return $this->morphMany(BannedReason::class, 'banned_reasonable');
    }
}
