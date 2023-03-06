<?php

namespace App\Http\Controllers\Admin\UpperBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpperBanner\UpdateRequest;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, UpperBanner $upper_banner)
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
        $upper_banner->update($data);
        return view('admin.banners.upper_banners.show', compact('upper_banner'));
    }
}
