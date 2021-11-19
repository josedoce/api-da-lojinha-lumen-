<?php
namespace App\Utils;
use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Http\Response;

class Guardian
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }
    public function validatedUser($next, $token, $roles= 'user'){
        $bearerToken = $token;
        $status = Response::HTTP_FORBIDDEN;
        $message = 'no messages';

        if($bearerToken==null) {
            $message = 'Bearer token is empty.';
            return response([
                'token'=> $bearerToken,
                'success'=>false,
                'status'=>$status,
                'message' => $message
            ], $status);
        };

        $isValid = $this->ifTokenIsValidReturnObject($bearerToken, env('APP_KEY'));

        if($isValid == 'INVALID_TOKEN') {
            $message = 'Token is invalid or expired.';
            return response([
                'token'=> $bearerToken,
                'success'=>false,
                'status'=>$status,
                'message' => $message
            ], $status);
        }

        $user = $this->userRepo->findWhereEmailIs($isValid->sub);
        if($user->role!=$roles){

            $message = 'Area is only permitted for '.$roles.'. ';
            return response([
                'success'=>false,
                'status'=>$status,
                'message' => $message
            ], $status);
        }

        return $next;
    }

    private function ifTokenIsValidReturnObject($token, $secret){
        try {
            return JWT::decode($token, $secret, ['HS256']);
        }catch (\Exception $e) {
            return 'INVALID_TOKEN';
        }
    }
}
