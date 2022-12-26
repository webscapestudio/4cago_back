<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MarketingFaq\StoreRequest;
use App\Models\MarketingFaq;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $faq_marketings = MarketingFaq::create([
            'title' =>  $request->title,
            'content' =>  $request->content,
            'published' =>  $request->published,
        ]);
        $faq_marketings->save();
        return redirect()->route('admin.faq_marketing.index');
    }
}
