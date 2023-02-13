<?php

namespace App\Http\Controllers\CategoryWork\Work\BannedReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\Work\BannedReason\StoreRequest;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($category_work_id, $work_id, StoreRequest $request)
    {

        $work = Work::find($work_id);
        $data = $request->validated();

        $work->banned_reason()->create([
            'user_id' => Auth::user()->id,
            'banned_reason' =>  $data['banned_reason'],
            'other_report' => $data['other_report'],
            'status' => '0'
        ]);

        return redirect()->back();
    }
}
