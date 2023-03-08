<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\MarketingFaq;

class DestroyController extends Controller
{
    public function __invoke($faq_marketing_slug)
    {
        $faq_marketing = MarketingFaq::whereSlug($faq_marketing_slug)->firstOrFail();
        $faq_marketing->delete();
        return redirect()->route('admin.faq_marketing.index');
    }
}
