<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository extends BaseRepository
{

    protected $model = Post::class;

}
