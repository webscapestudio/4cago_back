<?php

namespace App\Http\Controllers\Admin\LeftBanner;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;


class DestroyController extends Controller
{
    public function __invoke(LeftBanner $left_banner)
    {
        $left_banner->delete();
        return redirect()->route('admin.left_banner.index');
    }
}
