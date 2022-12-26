<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryHelp;

class EditController extends Controller
{
    public function __invoke(CategoryHelp $categories_asked_question)
    { {

            return view('admin.faq.categories_asked_questions.edit', compact('categories_asked_question'));
        }
    }
}
