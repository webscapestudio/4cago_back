<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'categories';

  //Mass assigned
  protected $fillable = [
    'title',
    'slug',
    'parent_id',
    'published',
    'created_by',
    'modified_by',
    'description'
  ];
  // Mutators
  public function setSlugAttribute()
  {
    $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
  }
  public function childrenCategories()
  {
    return $this->hasMany(self::class, 'parent_id');
  }
  public function parent()
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }

  public function postCount()
  {
    return $this->hasMany(Post::class);
  }
  function comments()
  {
    return $this->hasMany(Comment::class);
  }
}
