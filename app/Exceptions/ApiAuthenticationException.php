<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class ApiAuthenticationException extends Exception implements Responsable
{
    public function toResponse($request)
    {
        return new JsonResponse([
            'message' => 'Bearer Token not provided or invalid.',
            'status' => 'ERROR'
        ], 401);
    }
}
