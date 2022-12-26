<?php

namespace App\Http\Controllers\Admin\RightBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RightBanner\UpdateRequest;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, RightBanner $right_banner)
    {
        $data = $request->validated();
        if (isset($data['banner_image'])) :
            $data['banner_image'] = Storage::disk('public')->put('/images',  $data['banner_image']);
        endif;
        $right_banner->update($data);
        return view('admin.banners.right_banners.show', compact('right_banner'));
    }
}
