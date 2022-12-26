<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories_help = CategoryHelp::all();
        return view('admin.faq.asked_questions.create', [
            'asked_questions' => [],
        ], compact('categories_help'));
    }
}
