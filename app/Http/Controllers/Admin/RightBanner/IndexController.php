<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;
use App\Models\RightBanner;

class IndexController extends Controller
{
    public function __invoke()
    {
        $right_banners = RightBanner::all();
        return view('admin.banners.right_banners.index', compact('right_banners'));
    }
}
