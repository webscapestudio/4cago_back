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
            return response()->json($advertisement);
        endif;
        $advertisement->like()->create(['user_id' => Auth::user()->id]);

        return response()->json($advertisement);
    }
}
