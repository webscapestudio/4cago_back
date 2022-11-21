<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $works = Work::all();
        $user = Auth::user();
        return view('personal.works.index', compact('works', 'user'));
    }
}
