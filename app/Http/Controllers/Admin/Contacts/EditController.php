<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;


class EditController extends Controller
{
    public function __invoke(Contacts $contact)
    {
        return view('admin.faq.contacts.edit',  compact('contact'));
    }
}
