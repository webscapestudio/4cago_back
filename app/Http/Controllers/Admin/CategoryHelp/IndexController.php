<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = CategoryHelp::all();
        return view('admin.faq.categories_asked_questions.index', compact('categories'));
    }
}
