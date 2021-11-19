<?php


namespace App\Http\Middleware;

use Closure;
use App\Utils\Guardian;
use Illuminate\Http\Request;

class UserMiddleware
{
    private $guardian;
    public function __construct(Guardian $guardian)
    {
        $this->guardian = $guardian;
    }

    public function handle(Request $request, Closure $next, $guard = null)
    {
        $response = $next($request);
        $bearerToken = $request->bearerToken();
        return $this->guardian->validatedUser($response, $bearerToken, 'user');
    }
}
