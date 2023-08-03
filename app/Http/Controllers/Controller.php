<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.0",
 *    title="Movies API",
 *   description="This is a consumption-only API — only the HTTP GET method is available on resources.",
 * )
 * @OA\Server(
 *    description="Movies API - local environment",
 *  url="http://localhost:8000"
 * )
 * @OA\Server(
 *   description="Movies API - production environment",
 *   url="https://movies-api.apps.marcobardalesrodriguez.site"
 * )
 * @OA\SecurityScheme(
 *     @OA\Flow(
 *         flow="clientCredentials",
 *         tokenUrl="oauth/token",
 *         scopes={}
 *     ),
 *     securityScheme="bearerAuth",
 *     in="header",
 *     type="http",
 *     description="Enter the token without the 'Bearer' prefix, it is added automatically. We recommend you first log in and get a token.",
 *     name="oauth2",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
