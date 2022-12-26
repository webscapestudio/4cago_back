<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;


class CreateController extends Controller
{
    public function __invoke()
    {

        return view('admin.faq.categories_asked_questions.create');
    }
}
