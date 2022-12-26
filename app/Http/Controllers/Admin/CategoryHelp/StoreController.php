<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryHelp\StoreRequest;
use App\Models\CategoryHelp;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        CategoryHelp::create($request->all());
        return redirect()->route('admin.category_question.index');
    }
}
