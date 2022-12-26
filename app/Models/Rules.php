<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rules extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'rules';
    protected $guarded = false;
    protected $fillable = ['published', 'title', 'content',];
}
