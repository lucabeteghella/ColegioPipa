<?php

namespace App\Http\Controllers;

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
        $data = $this->repo->getAll();
        return $this->successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->repo->addUser($request->all());
        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repo->getOne($id);
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->repo->updateUser($request->all(), $id);
        return $this->successResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->repo->deleteOne($id);
        return $this->successResponse($data);
    }
}
