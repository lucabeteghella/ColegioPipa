<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;


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

    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken($request->email);

            return $this->successResponse($token->plainTextToken);
        } else {
            return $this->errorResponse('Usuário ou senha inválidos');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return $this->successResponse('Usuário deslogado');
    }
}
