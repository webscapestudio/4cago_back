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
        if (isset($data['banner_image'])) :
            $data['banner_image'] = Storage::disk('public')->put('/images',  $data['banner_image']);
        endif;
        $upper_banner->update($data);
        return view('admin.banners.upper_banners.show', compact('upper_banner'));
    }
}
