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

    public function addUser(Request $request) {
        $userData = $request->only('name', 'email', 'phone_number', 'cpf', 'permission_id', 'password');

        DB::beginTransaction();
        try {
            $newUser = $this->model->create($userData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $newUser;
    }

    public function updateUser(Request $request, string $id) {
        $userData = $request->only('name', 'email', 'phone_number', 'cpf', 'password');

        DB::beginTransaction();
        try {
            $user = $this->getOne($id);

            $user->fill($userData);
            $updateUser = $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $updateUser;
    }

}
