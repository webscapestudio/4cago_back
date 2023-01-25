<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;
use App\Models\UpperBanner;


class ShowController extends Controller
{
    public function __invoke(UpperBanner $upper_banner)
    {
        return view('admin.banners.upper_banners.show', compact('upper_banner'));
    }
}
