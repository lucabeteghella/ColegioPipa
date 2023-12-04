<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    use ApiResponser;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $this->errorResponse("Usuário não autenticado", 401);
    }
}
