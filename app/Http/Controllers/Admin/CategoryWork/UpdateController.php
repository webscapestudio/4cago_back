<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categorywork\UpdateRequest;
use App\Models\CategoryWork;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CategoryWork $category_work)
    {
        $data = $request->except('slug');
        $category_work->update($data);
        return redirect()->route('admin.category_work.index');
    }
}
