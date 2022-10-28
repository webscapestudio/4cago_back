<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementTag extends Model
{
    use HasFactory;
    protected $table = 'advertisement_tags';
    protected $guarded = false;
}
