<?php

namespace App\Http\Controllers\Advertisement\Dislike;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke(Advertisement $advertisement)
    {
        $advertisement = Advertisement::find($advertisement->id);
        if (Auth::user()->hasDislikedAdvertisement($advertisement)) :
            $advertisement->dislike()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $advertisement->dislike()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
