<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Requests\Admin\UpperBanner\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        if (isset($data['banner_image_mob'])) :
            $data['banner_image_mob'] = Storage::disk('public')->put('/images',  $data['banner_image_mob']);
        else :
            $data['banner_image_mob'] = null;
        endif;
        if (isset($data['banner_image_tablet'])) :
            $data['banner_image_tablet'] = Storage::disk('public')->put('/images',  $data['banner_image_tablet']);
        else :
            $data['banner_image_tablet'] = null;
        endif;
        if (isset($data['banner_image_desktop'])) :
            $data['banner_image_desktop'] = Storage::disk('public')->put('/images',  $data['banner_image_desktop']);
        else :
            $data['banner_image_desktop'] = null;
        endif;

        $upper_banner = UpperBanner::create([
            'title' =>  $request->title,
            'link' =>  $request->link,
            'published' =>  $request->published,
            'banner_image_mob' => $data['banner_image_mob'],
            'banner_image_tablet' => $data['banner_image_tablet'],
            'banner_image_desktop' => $data['banner_image_desktop'],
        ]);
        $upper_banner->save();

        return redirect()->route('admin.upper_banner.index');
    }
}
