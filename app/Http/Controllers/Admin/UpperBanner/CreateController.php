<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.banners.upper_banners.create');
    }
}
