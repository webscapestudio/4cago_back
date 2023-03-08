<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryWork extends Model
{
  use Sluggable;
  use HasFactory;
  use SoftDeletes;
  protected $table = 'categories_works';

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
  public function sluggable(): array
  {
    return ['slug' => ['source' => 'title']];
  }
  public function childrenCategories()
  {
    return $this->hasMany(self::class, 'parent_id');
  }
  public function workCount()
  {
    return $this->hasMany(Work::class);
  }
  function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public function parent()
  {
    return $this->belongsTo(CategoryWork::class, 'parent_id');
  }
}
