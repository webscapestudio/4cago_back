<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $advertisements = Advertisement::all();
        $user = Auth::user();

        return view('admin.advertisements.index', compact('advertisements', 'user'));
    }
}
