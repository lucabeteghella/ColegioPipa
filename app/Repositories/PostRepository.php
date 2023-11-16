<?php

namespace App\Repositories;

use App\Models\Post;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{

    protected $model = Post::class;

    public function addPost(Request $request) {
        $postData = $request->only('title', 'description', 'image_id', 'category_id', 'tag_id');

        DB::beginTransaction();
        try {
            $newPost = $this->model->create($postData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $newPost;
    }

    public function updatePost(Request $request, string $id) {
        $postData = $request->only('title', 'description', 'image_id', 'category_id', 'tag_id');

        DB::beginTransaction();
        try {
            $post = $this->getOne($id);

            $post->fill($postData);
            $updatedPost = $post->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $updatedPost;
    }

}
