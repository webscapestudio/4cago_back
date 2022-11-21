<?php

namespace App\Http\Controllers\Advertisement\Like;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke(Advertisement $advertisement)
    {
        $advertisement = Advertisement::find($advertisement->id);
        if (Auth::user()->hasLikedAdvertisement($advertisement)) :
            $advertisement->like()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $advertisement->like()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
