<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Work\UpdateRequest;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Work $work)
    {
        $author = Auth::user();
        $data = $request->input();
        if (isset($data['work_image'])) :
            $data['work_image'] = Storage::disk('public')->put('/images',  $data['work_image']);
        endif;

        $work->update($data);

        return redirect()->route('personal.work.index');
    }
}
