<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $categories_asked_question = CategoryHelp::whereSlug($slug)->firstOrFail();
        $categories_asked_question->postCount()->where('category_id', $categories_asked_question->id)->update([
            'category_id' => 1,
            'published' => '0'
        ]);
        $categories_asked_question->delete();
        return redirect()->route('admin.category_question.index');
    }
}
