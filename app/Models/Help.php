<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Help extends Model
{
    use Sluggable;
    use SoftDeletes;
    use HasFactory;
    protected $table = 'asked_questions';
    protected $guarded = false;
    protected $fillable = ['published', 'title', 'category_help_id', 'content', 'slug'];
    public function categoriy_asked_question()
    {
        return $this->belongsTo(CategoryHelp::class, 'category_help_id');
    }
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}
