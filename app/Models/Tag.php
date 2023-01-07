<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tags';
    protected $guarded = false;

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
    public function advertisements()
    {
        return $this->morphedByMany(Advertisement::class, 'taggable');
    }
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }
}
