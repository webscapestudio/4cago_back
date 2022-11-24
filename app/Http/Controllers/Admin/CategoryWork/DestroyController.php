<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(CategoryWork $category_work)
    {
        $category_work->delete();
        return redirect()->route('admin.category_work.index');
    }
}
