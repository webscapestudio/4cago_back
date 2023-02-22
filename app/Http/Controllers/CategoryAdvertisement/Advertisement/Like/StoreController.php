<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Like;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($category_advertisement_id, $advertisement_id)
    {
        $advertisement = Advertisement::find($advertisement_id);
        if (Auth::user()->hasLikedAdvertisement($advertisement)) :
            $advertisement->like()->where('user_id', Auth::user()->id)->delete();
        else :
            $advertisement->like()->create(['user_id' => Auth::user()->id])->save();
        endif;
        $advertisementCount = Advertisement::find($advertisement_id);
        return response()->json($advertisementCount->like->count());
    }
}
