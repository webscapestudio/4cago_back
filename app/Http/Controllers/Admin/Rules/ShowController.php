<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;
use App\Models\Rules;


class ShowController extends Controller
{
    public function __invoke(Rules $rules)
    {
        return view('admin.faq.rules.show', compact('rules'));
    }
}
