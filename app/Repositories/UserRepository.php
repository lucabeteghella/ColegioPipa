<?php

namespace App\Repositories;

use App\Models\User;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{

    protected $model = User::class;

    public function addUser($data) {
        DB::beginTransaction();
        try {
            $newUser = $this->model->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $newUser;
    }

    public function updateUser($data, string $id) {
        DB::beginTransaction();
        try {
            $user = $this->getOne($id);

            $user->fill($data);
            $updateUser = $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $updateUser;
    }

}
