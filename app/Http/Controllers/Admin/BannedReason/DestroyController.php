<?php

namespace App\Http\Controllers\Admin\BannedReason;

use App\Http\Controllers\Controller;
use App\Models\BannedReason;


class DestroyController extends Controller
{
    public function __invoke(BannedReason $banned_reason)
    {
        $banned_reason->delete();
        return redirect()->route('admin.banned_reason.index');
    }
}
