<?php

namespace App\Http\Controllers\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class EditController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {

        return view('personal.advertisements.comments.comments_edit', [
            'advertisement'
        ]);
    }
}
