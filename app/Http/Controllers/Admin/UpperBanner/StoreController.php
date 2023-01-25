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
        if (isset($data['banner_image'])) :
            $data['banner_image'] = Storage::disk('public')->put('/images',  $data['banner_image']);
        else :
            $data['banner_image'] = null;
        endif;
        $upper_banner = UpperBanner::create([
            'title' =>  $request->title,
            'link' =>  $request->link,
            'published' =>  $request->published,
            'banner_image' => $data['banner_image'],
        ]);
        $upper_banner->save();

        return redirect()->route('admin.upper_banner.index');
    }
}
