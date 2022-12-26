<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = CategoryHelp::all();
        // foreach ($categories as $category) :
        //     dd($category->questionsCount->count());
        // endforeach;
        return view('admin.faq.categories_asked_questions.index', compact('categories'));
    }
}
