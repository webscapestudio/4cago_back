<?php

namespace App\Http\Controllers\Admin\BannedReason;

use App\Http\Controllers\Controller;
use App\Models\BannedReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $search = $request->s;
        $banned_reasons = BannedReason::query()
            ->where('id', 'LIKE', "%{$search}%")
            ->orWhere('banned_reason', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.banned_reason.index', compact('banned_reasons', 'user'));
    }
}
