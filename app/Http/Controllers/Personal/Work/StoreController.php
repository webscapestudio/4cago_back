<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Work\StoreRequest;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $author = Auth::user();
        $data = $request->input();

        if (isset($data['work_image'])) :
            $data['work_image'] = Storage::disk('public')->put('/images',  $data['work_image']);
        endif;
        $work = Work::create([
            'category_work_id' =>  $request->category_work_id,
            'title' =>  $request->title,
            'content' =>  0,
            'requirements' => $request->requirements,
            'tasks' => $request->tasks,
            'conditions' => $request->conditions,
            'mail_applicants' => $request->mail_applicants,
            'mail_notifications' => $request->mail_notifications,
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'salary_from' => $request->salary_from,
            'salary_before' => $request->salary_before,
            'work_image' => 0,
            'user_id' => $author->id,
            'is_published' =>  $request->published,
            'is_banned' =>  0,
            'term' =>  0,
            'type' => $request->type,
            'place' => $request->place,
        ]);
        $work->save();
        return redirect()->route('personal.work.index');
    }
}
