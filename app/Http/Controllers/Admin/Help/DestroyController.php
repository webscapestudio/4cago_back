<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;


class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $asked_question = Help::whereSlug($slug)->firstOrFail();
        $asked_question->delete();
        return redirect()->route('admin.asked_question.index');
    }
}
