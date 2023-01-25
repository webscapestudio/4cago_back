<?php

namespace App\Http\Controllers\Admin\BannedReason;

use App\Http\Controllers\Controller;
use App\Models\BannedReason;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $banned_reasons = BannedReason::all();
        $user = Auth::user();

        return view('admin.banned_reason.index', compact('banned_reasons', 'user'));
    }
}
