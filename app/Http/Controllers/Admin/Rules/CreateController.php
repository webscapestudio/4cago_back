<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.faq.rules.create', [
            'rule' => [],
        ]);
    }
}
