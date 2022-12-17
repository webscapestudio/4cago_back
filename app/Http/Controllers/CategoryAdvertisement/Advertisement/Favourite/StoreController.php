<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($category_advertisement_id, $advertisement_id)
    {
        $advertisement = Advertisement::find($advertisement_id);
        if (Auth::user()->hasFavouritedAdvertisement($advertisement)) :
            $advertisement->favourite()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $advertisement->favourite()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
