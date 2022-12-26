<?php

namespace App\Http\Controllers\Admin\LeftBanner;

use App\Http\Requests\Admin\LeftBanner\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
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
        $left_banner = LeftBanner::create([
            'title' =>  $request->title,
            'link' =>  $request->link,
            'published' =>  $request->published,
            'banner_image' => $data['banner_image'],
        ]);
        $left_banner->save();

        return redirect()->route('admin.left_banner.index');
    }
}
