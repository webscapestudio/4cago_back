<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\MarketingFaq;

class IndexController extends Controller
{
    public function __invoke()
    {
        $faq_marketings = MarketingFaq::all();

        return view('admin.faq.faq_marketings.index', compact('faq_marketings'));
    }
}
