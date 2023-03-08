<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $category_slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrFail();
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.index');
    }
}
