<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
       Category::create($request->all());
        return redirect()->route('admin.category.index');
    }

}
