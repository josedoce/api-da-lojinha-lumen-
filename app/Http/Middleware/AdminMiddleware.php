<?php
namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use App\Utils\Guardian;
use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminMiddleware
{
    private $guardian;
    public function __construct(Guardian $guardian)
    {
        $this->guardian = $guardian;
    }

    public function handle(Request $request, Closure $next, $guard = null){
        $response =  $next($request);
        $bearerToken = $request->bearerToken();
        return $this->guardian->validatedUser($response, $bearerToken, 'admin');
    }

}
