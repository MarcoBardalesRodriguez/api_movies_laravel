<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiAuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->is('api/*')) {
            throw new ApiAuthenticationException();
        }

        return route('/');
    }
}
