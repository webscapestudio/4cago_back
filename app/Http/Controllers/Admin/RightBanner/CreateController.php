<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.banners.right_banners.create');
    }
}
