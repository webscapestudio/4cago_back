<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class MarketingFaq extends Model
{
  use Sluggable;
  use SoftDeletes;
  use HasFactory;
  protected $table = 'faq_marketings';
  protected $guarded = false;
  protected $fillable = ['published', 'title', 'content', 'slug'];
  public function sluggable(): array
  {
    return ['slug' => ['source' => 'title']];
  }
}
