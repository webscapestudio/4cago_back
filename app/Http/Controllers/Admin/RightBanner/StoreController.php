<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Requests\Admin\RightBanner\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['banner_image'])) :
            $data['banner_image'] = Storage::disk('public')->put('/images',  $data['banner_image']);
        else :
            $data['banner_image'] = null;
        endif;
        $right_banners = RightBanner::create([
            'title' =>  $request->title,
            'link' =>  $request->link,
            'published' =>  $request->published,
            'banner_image' => $data['banner_image'],
        ]);
        $right_banners->save();

        return redirect()->route('admin.right_banner.index');
    }
}
