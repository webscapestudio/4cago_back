<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannedReason extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'banned_reason', 'other_report', 'status'];
    public function banned_reasonable()
    {
        return $this->morphTo();
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
