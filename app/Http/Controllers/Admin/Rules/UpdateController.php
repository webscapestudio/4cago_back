<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rules\UpdateRequest;
use App\Models\Rules;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Rules $rules)
    {
        $data = $request->validated();
        $rules->update($data);
        return view('admin.faq.rules.show', compact('rules'));
    }
}
