<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'advertisements';
    protected $guarded = false;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'advertisement_tags', 'advertisement_id', 'tag_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category_advertisement()
    {
        return $this->belongsTo(CategoryAdvertisement::class, 'category_advertisement_id');
    }
}
