<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(CategoryHelp $categories_asked_question)
    {
        $categories_asked_question->delete();
        return redirect()->route('admin.category_question.index');
    }
}
