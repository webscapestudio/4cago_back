<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;

class IndexController extends Controller
{
    public function __invoke()
    {
        $asked_questions = Help::all();
        return view('admin.faq.asked_questions.index', compact('asked_questions'));
    }
}
