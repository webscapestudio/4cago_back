<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $advertisements = Advertisement::latest()->with('like')->paginate(6);
        return view('advertisements.index', compact('advertisements', 'user'));
    }
}
