<?php

namespace App\Http\Controllers\Admin\BannedReason;

use App\Http\Controllers\Controller;
use App\Models\BannedReason;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(BannedReason $banned_reason)
    {
        $user = Auth::user();
        return view('admin.banned_reason.show', compact('banned_reason', 'user'));
    }
}
