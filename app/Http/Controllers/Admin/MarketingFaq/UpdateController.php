<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MarketingFaq\UpdateRequest;
use App\Models\MarketingFaq;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $faq_marketing_slug)
    {
        $faq_marketing = MarketingFaq::whereSlug($faq_marketing_slug)->firstOrFail();
        $data = $request->validated();
        $faq_marketing->update($data);
        return view('admin.faq.faq_marketings.show', compact('faq_marketing'));
    }
}
