<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Repositories\UserRepository;


class UserController extends Controller
{

    Use ApiResponser;

    protected $repo;

    public function __construct(UserRepository $userRepository) {
        $this->repo = $userRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->repo->getAllUsers();
        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $this->repo->addUser($request);
        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repo->getOneUser($id);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, UserUpdateRequest $request)
    {
        $data = $this->repo->updateUser($request, $id);
        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->repo->deleteOneUser($id);
        return $this->successResponse($data);
    }
}
