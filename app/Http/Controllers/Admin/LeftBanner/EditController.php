<?php

namespace App\Http\Controllers\Admin\LeftBanner;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;


class EditController extends Controller
{
    public function __invoke(LeftBanner $left_banner)
    {
        return view('admin.banners.left_banners.edit',  compact('left_banner'));
    }
}
