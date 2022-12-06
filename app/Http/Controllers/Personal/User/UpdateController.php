<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Personal\User\UpdateRequest;
use App\Models\Post;
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
        return redirect()->back();
    }
}
