<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\User;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{

    protected $model = User::class;

    public function getAllUsers()
    {
        return User::with('image')->get();
    }

    public function getOneUser($id)
    {
        return User::where('id', $id)->with('image')->get();
    }

    public function addUser($request) {
        $imageContent = $request->hasFile('image') ? $request->file('image')->get() : null;

        DB::beginTransaction();
        try {
            $userData = $request->validated();

            if ($imageContent) {
                $imageBase64 = base64_encode($imageContent);
                $userData['image'] = $imageBase64;
            }

            $newUser = User::create($userData);
            $newUser->image()->create($userData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $newUser;
    }

    public function updateUser($request, string $id) {
        $imageContent = $request->hasFile('image') ? $request->file('image')->get() : null;

        DB::beginTransaction();
        try {
            $userData = $this->getOne($id);
            $updatedUser = $request->validated();

            if ($imageContent) {
                $updatedUser['image'] = base64_encode($imageContent);
            }

            $userData->fill($updatedUser);
            $userData->save();

            $userData->image()->update([
                'image' => $updatedUser['image']
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $updatedUser;
    }

    public function deleteOneUser($id)
    {
        DB::beginTransaction();
        try {
            $userData = $this->getOne($id);

            if ($userData->image) {
                Image::destroy($userData->image->id);
            }

            $userData->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Erro ao excluir usuário: " . $e->getMessage());
        }

        return $userData;
    }

}
