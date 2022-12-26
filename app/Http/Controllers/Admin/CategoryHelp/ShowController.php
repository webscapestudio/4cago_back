<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(CategoryHelp $categories_asked_question)
    {

        return view('admin.faq.categories_asked_questions.show', compact('categories_asked_question'));
    }
}
