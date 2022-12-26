<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Requests\Admin\Contacts\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Contacts;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $contacts = Contacts::create([
            'title' =>  $request->title,
            'content' =>  $request->content,
            'published' =>  $request->published,
            'link' => $request->link,
        ]);
        $contacts->save();

        return redirect()->route('admin.contact.index');
    }
}
