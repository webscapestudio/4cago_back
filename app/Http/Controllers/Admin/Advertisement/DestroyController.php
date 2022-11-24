<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('admin.advertisement.index');
    }
}
