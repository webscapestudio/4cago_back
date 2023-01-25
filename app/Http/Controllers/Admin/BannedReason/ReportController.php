<?php

namespace App\Http\Controllers\Admin\BannedReason;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\BannedReason;
use App\Models\News;
use App\Models\Post;

class ReportController extends Controller
{
    public function __invoke(BannedReason $banned_reason)
    {
        if ($banned_reason->banned_reasonable_type == 'App\Models\Advertisement') :
            $val = Advertisement::find($banned_reason->banned_reasonable->id);
        endif;
        if ($banned_reason->banned_reasonable_type == 'App\Models\Post') :
            $val = Post::find($banned_reason->banned_reasonable->id);
        endif;
        if ($banned_reason->banned_reasonable_type == 'App\Models\News') :
            $val = News::find($banned_reason->banned_reasonable->id);
        endif;
        if (($banned_reason->banned_reasonable->published == 2) and  ($banned_reason->status == "1")) {
            $data = ['published' => '1'];
            $data_ban = ['status' => '0'];
            $val->update($data);
            $banned_reason->update($data_ban);
        }
        if (($banned_reason->banned_reasonable->published == 1) and  ($banned_reason->status == "0")) {
            $data = ['published' => '2'];
            $data_ban = ['status' => '1'];
            $val->update($data);
            $banned_reason->update($data_ban);
        }

        return redirect()->back();
    }
}
