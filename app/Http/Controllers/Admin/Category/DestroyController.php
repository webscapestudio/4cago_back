<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke($category_slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrFail();
        $category->postCount()->where('category_id', $category->id)->update([
            'category_id' => 1,
            'published' => '0'
        ]);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
