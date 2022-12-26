<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contacts\UpdateRequest;
use App\Models\Contacts;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Contacts $contact)
    {
        $data = $request->validated();
        $contact->update($data);
        return view('admin.faq.contacts.show', compact('contact'));
    }
}
