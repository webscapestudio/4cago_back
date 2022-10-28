<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryAdvertisement\UpdateRequest;
use App\Models\CategoryAdvertisement;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CategoryAdvertisement $category_advertisement)
    {
        $data = $request->except('slug');
        $category_advertisement->update($data);
        return redirect()->route('admin.category_advertisement.index');
    }
}
