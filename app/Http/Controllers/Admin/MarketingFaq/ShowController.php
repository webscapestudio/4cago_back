<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\MarketingFaq;

class ShowController extends Controller
{
    public function __invoke($faq_marketing_slug)
    {
        $faq_marketing = MarketingFaq::whereSlug($faq_marketing_slug)->firstOrFail();
        return view('admin.faq.faq_marketings.show', compact('faq_marketing'));
    }
}
