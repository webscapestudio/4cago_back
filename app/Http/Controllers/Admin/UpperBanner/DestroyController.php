<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;
use App\Models\UpperBanner;


class DestroyController extends Controller
{
    public function __invoke(UpperBanner $upper_banner)
    {
        $upper_banner->delete();
        return redirect()->route('admin.upper_banner.index');
    }
}
