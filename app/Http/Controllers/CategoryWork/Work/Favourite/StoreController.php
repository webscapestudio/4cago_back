<?php

namespace App\Http\Controllers\CategoryWork\Work\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($category_work_id, $work_id)
    {
        $work = Work::find($work_id);
        if (Auth::user()->hasFavouritedWork($work)) :
            $work->favourite()->where('user_id', Auth::user()->id)->delete();
        else :
            $work->favourite()->create(['user_id' => Auth::user()->id])->save();
        endif;
        $workCount = Work::find($work_id);
        return response()->json($workCount->favourite->count());
    }
}
