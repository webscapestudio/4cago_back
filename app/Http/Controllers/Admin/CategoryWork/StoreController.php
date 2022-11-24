<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryWork\StoreRequest;
use App\Models\CategoryWork;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        CategoryWork::create($request->all());
        return redirect()->route('admin.category_work.index');
    }
}
