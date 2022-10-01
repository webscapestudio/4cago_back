<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        User::firstOrCreate($data);
        return redirect()->route('admin.user.index');
    }

}
