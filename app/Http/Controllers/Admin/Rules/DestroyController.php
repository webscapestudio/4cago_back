<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;
use App\Models\Rules;


class DestroyController extends Controller
{
    public function __invoke(Rules $rules)
    {
        $rules->delete();
        return redirect()->route('admin.rule.index');
    }
}
