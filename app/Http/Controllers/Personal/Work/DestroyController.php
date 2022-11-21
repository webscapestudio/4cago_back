<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;


class DestroyController extends Controller
{
    public function __invoke(Work $work)
    {
        $work->delete();
        return redirect()->route('personal.work.index');
    }
}
