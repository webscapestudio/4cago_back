<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\MarketingFaq;

class EditController extends Controller
{
    public function __invoke(MarketingFaq $faq_marketing)
    {

        return view('admin.faq.faq_marketings.edit', compact('faq_marketing'));
    }
}
