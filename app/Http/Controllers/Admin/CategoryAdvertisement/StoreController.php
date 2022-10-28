<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryAdvertisement\StoreRequest;
use App\Models\CategoryAdvertisement;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        CategoryAdvertisement::create($request->all());
        return redirect()->route('admin.category_advertisement.index');
    }
}
