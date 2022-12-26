<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.faq.contacts.create');
    }
}
