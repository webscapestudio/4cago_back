<?php
namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Facades\Storage;
class PostService
{
    public function store($data)
    {
        try{
            DB::beginTransaction();
            if (isset($data['tag_ids'])) :
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            endif;
            if (isset($data['post_image'])):
            $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image'] );
            endif;
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)):
            $post->tags()->attach($tagIds);
            endif;
            Db::commit();
         }catch(\Exception $exception){
            Db::rollBack();
                abort(500);
         }
    }
    public function update($data, $post )
    {
    try{
        DB::beginTransaction();
        if (isset($data['tag_ids'])) :
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        endif;
        if (isset($data['post_image'])):
            $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image'] );
        endif;
        $post->update($data);
        if (isset($tagIds)):
        $post->tags()->sync($tagIds);
        endif;
        Db::commit();
    }catch(\Exception $exception){
        Db::rollBack();
        abort(500);
    }
        return $post;
    }
}