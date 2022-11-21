<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'works';
    protected $guarded = false;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category_work()
    {
        return $this->belongsTo(CategoryWork::class, 'category_work_id');
    }
}
