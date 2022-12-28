<?php

namespace App\Http\Controllers\Admin\LeftBanner;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;

class IndexController extends Controller
{
    public function __invoke()
    {
        $left_banners = LeftBanner::all();
        return view('admin.banners.left_banners.index', compact('left_banners'));
    }
}
