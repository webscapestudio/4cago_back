<?php

namespace App\Http\Controllers\Admin\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;


class CreateController extends Controller
{
    public function __invoke()
    {

        return view('admin.faq.faq_marketings.create');
    }
}
