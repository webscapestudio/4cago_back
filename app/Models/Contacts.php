<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = false;
    protected $fillable = ['published', 'title', 'content', 'link'];
}
