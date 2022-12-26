<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RightBanner extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'right_banners';
    protected $guarded = false;
    protected $fillable = ['published', 'title',  'link', 'banner_image',];
}
