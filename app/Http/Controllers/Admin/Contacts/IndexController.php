<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class IndexController extends Controller
{
    public function __invoke()
    {
        $contacts = Contacts::all();
        return view('admin.faq.contacts.index', compact('contacts'));
    }
}
