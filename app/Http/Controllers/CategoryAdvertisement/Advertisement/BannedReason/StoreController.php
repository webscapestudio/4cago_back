<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\BannedReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\BannedReason\StoreRequest;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($category_advertisement_id, $advertisement_id, StoreRequest $request)
    {

        $advertisement = Advertisement::find($advertisement_id);
        $data = $request->validated();

        $advertisement->banned_reason()->create([
            'user_id' => Auth::user()->id,
            'banned_reason' =>  $data['banned_reason'],
            'other_report' => $data['other_report'],
            'status' => '0'
        ]);

        return redirect()->back();
    }
}
