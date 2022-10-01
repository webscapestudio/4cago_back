<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class EditController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

}
