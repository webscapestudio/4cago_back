<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeftBanner extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'left_banners';
    protected $guarded = false;
    protected $fillable = ['published', 'title',  'link', 'banner_image',];
}
