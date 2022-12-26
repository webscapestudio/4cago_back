<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;


class DestroyController extends Controller
{
    public function __invoke(Contacts $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index');
    }
}
