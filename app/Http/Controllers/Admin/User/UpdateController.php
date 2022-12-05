<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data['user_avatar'])) :
            $data['user_avatar'] = Storage::disk('public')->put('/images/users_avatars',  $data['user_avatar']);
        endif;
        $user->update($data);
        return view('admin.users.show', compact('user'));
    }
}
