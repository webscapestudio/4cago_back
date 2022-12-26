<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;
use App\Models\RightBanner;


class EditController extends Controller
{
    public function __invoke(RightBanner $right_banner)
    {
        return view('admin.banners.right_banners.edit',  compact('right_banner'));
    }
}
