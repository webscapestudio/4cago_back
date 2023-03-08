<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryHelp extends Model
{
  use Sluggable;
  use HasFactory;
  use SoftDeletes;
  protected $table = 'categories_asked_questions';

  //Mass assigned
  protected $fillable = [
    'title',
    'slug',
    'parent_id',
    'published',
    'created_by',
    'modified_by',
    'slug'
  ];
  public function sluggable(): array
  {
    return ['slug' => ['source' => 'title']];
  }
  public function questionsCount()
  {
    return $this->hasMany(Help::class);
  }
  public function asked_questions()
  {
    return $this->hasMany(Help::class);
  }
}
