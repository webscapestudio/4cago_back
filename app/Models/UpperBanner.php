<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpperBanner extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'upper_banners';
    protected $guarded = false;
    protected $fillable = ['published', 'title',  'link', 'banner_image',];
}
