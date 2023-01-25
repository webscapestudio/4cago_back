<?php

namespace App\Http\Controllers\News\BannedReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\BannedReason\StoreRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($news_id, StoreRequest $request)
    {

        $news = News::find($news_id);
        $data = $request->validated();

        $news->banned_reason()->create([
            'user_id' => Auth::user()->id,
            'banned_reason' =>  $data['banned_reason'],
            'other_report' => $data['other_report'],
            'status' => '0'
        ]);

        return redirect()->back();
    }
}
