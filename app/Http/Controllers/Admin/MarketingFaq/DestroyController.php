<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\MarketingFaq;

class DestroyController extends Controller
{
    public function __invoke(MarketingFaq $faq_marketing)
    {
        $faq_marketing->delete();
        return redirect()->route('admin.faq_marketing.index');
    }
}
