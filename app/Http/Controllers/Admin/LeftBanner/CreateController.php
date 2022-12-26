<?php

namespace App\Http\Controllers\Admin\LeftBanner;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.banners.left_banners.create');
    }
}
