<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;
use App\Models\UpperBanner;


class EditController extends Controller
{
    public function __invoke(UpperBanner $upper_banner)
    {
        return view('admin.banners.upper_banners.edit',  compact('upper_banner'));
    }
}
