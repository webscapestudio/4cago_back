<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.users.create', compact('users'));
    }

}
 