<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;
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
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}
