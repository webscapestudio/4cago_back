<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;
use App\Models\Rules;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rules = Rules::all();
        return view('admin.faq.rules.index', compact('rules'));
    }
}
