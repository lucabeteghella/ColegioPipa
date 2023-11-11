<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $repo;

    public function __construct(PostRepository $postRepository) {
        $this->repo = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->repo->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
