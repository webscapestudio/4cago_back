<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;


class DestroyController extends Controller
{
    public function __invoke(Help $asked_question)
    {
        $asked_question->delete();
        return redirect()->route('admin.asked_question.index');
    }
}
