<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostRepository extends BaseRepository
{

    protected $model = Post::class;

    public function getAllPost()
    {
        return Post::with('image')->get();
    }

    public function addPost($request)
    {
        $imageContent = $request->hasFile('image') ? $request->file('image')->get() : null;

        DB::beginTransaction();
        try {
            if ($imageContent) {
                $imageBase64 = base64_encode($imageContent);
                $image = Image::create([
                    'image' => $imageBase64,
                ]);
            }

            $postData = $request->only('title', 'description', 'category_id', 'tag_id');
            $postData['image_id'] = $image->id ?? null;

            $newPost = Post::create($postData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Erro ao criar post: " . $e->getMessage());
        }

        return $newPost;
    }

    public function getOnePost($id)
    {
        return Post::where('id', $id)->with('image')->get();
    }

    public function updatePost(string $id, $request)
    {
        $imageContent = $request->hasFile('image') ? $request->file('image')->get() : null;

        DB::beginTransaction();
        try {
            $postData = $this->getOne($id);

            if ($imageContent) {
                $imageBase64 = base64_encode($imageContent);
                $image = Image::create([
                    'image' => $imageBase64,
                ]);
            }

            $updatedPost = $request->only('title', 'description', 'category_id', 'tag_id');
            $updatedPost['image_id'] = $image->id ?? null;

            $postData->fill($updatedPost);
            $postData->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Erro ao atualizar post: " . $e->getMessage());
        }

        return $postData;
    }

    public function deleteOnePost($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->getOne($id);

            if ($data->image) {
                Image::destroy($data->image->id);
            }

            $data->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Erro ao excluir post: " . $e->getMessage());
        }

        return $data;
    }

}

