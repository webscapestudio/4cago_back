<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;


class DestroyController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('personal.advertisement.index');
    }
}
