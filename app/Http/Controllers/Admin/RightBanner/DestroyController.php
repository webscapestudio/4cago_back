<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;
use App\Models\RightBanner;


class DestroyController extends Controller
{
    public function __invoke(RightBanner $right_banner)
    {
        $right_banner->delete();
        return redirect()->route('admin.right_banner.index');
    }
}
