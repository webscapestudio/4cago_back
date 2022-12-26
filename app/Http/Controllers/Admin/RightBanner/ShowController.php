<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;
use App\Models\RightBanner;


class ShowController extends Controller
{
    public function __invoke(RightBanner $right_banner)
    {
        return view('admin.banners.right_banners.show', compact('right_banner'));
    }
}
