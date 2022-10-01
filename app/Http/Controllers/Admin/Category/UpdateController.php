<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data=$request->except('slug');
        $category->update($data);
        return redirect()->route('admin.category.index');
    }

}
