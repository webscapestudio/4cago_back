<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $user = Auth::user();
        return view('admin.advertisements.show', compact('advertisement', 'user'));
    }
}
