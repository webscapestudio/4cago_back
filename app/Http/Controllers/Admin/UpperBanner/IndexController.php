<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;
use App\Models\UpperBanner;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banners = UpperBanner::all();
        return view('admin.banners.upper_banners.index', compact('upper_banners'));
    }
}
