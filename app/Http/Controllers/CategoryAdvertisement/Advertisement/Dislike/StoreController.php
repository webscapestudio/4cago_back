<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Dislike;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{


    public function __invoke($category_advertisement_id, $advertisement_id)
    {
        $advertisement = Advertisement::find($advertisement_id);
        if (Auth::user()->hasDislikedAdvertisement($advertisement)) :
            $advertisement->dislike()->where('user_id', Auth::user()->id)->delete();
            return response()->json($advertisement);
        endif;
        $advertisement->dislike()->create(['user_id' => Auth::user()->id]);

        return response()->json($advertisement);
    }
}
