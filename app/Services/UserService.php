<?php
namespace App\Services;

use App\Exceptions\ApiException;
use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;


class UserService
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function registerUser(Request $request){
        $input = $request->all();
        $userAlreadyExists = $this->userRepo->findWhereEmailIs($input['email']);
        if($userAlreadyExists != null) throw new ApiException("User already exists.");
        $input['password'] = Hash::make($input['password']);
        $userCreated = $this->userRepo->store($input);
        $status = Response::HTTP_CREATED;
        $token = $this->generateToken($userCreated);
        return response([
            'token'=>$token,
            'message'=>'Account is created successfully!',
            'status'=> $status
        ], $status);
    }

    public function userSignIn(Request $request){
        $input = $request->all();
        $hasUser = $this->userRepo->findWhereEmailIs($input['email']);
        if($hasUser==null) throw new ApiException("User don't exist.", 400);
        if($hasUser->email != $input['email']) throw new ApiException("User email is invalid", 400);
        if(!Hash::check($input['password'], $hasUser->password)) throw new ApiException("User password is invalid", 400);
        $status = Response::HTTP_CREATED;

        $token = $this->generateToken($hasUser);

        return response([
            'token'=>$token,
            'message'=>'User is authenticated',
            'status'=> $status
        ], $status);
    }

    public function userSignOut(Request $request){
        $input = $request->all();
        //$this->userRepo->update($input['id'], ['secret'=>'']);
        return response(['unauthenticated'=>true],Response::HTTP_NO_CONTENT);
    }

    private function generateToken($dbUser):string{
        $date = new \DateTime();
        $secret = env('APP_KEY');
        $payload = [
            "iss"=>env('APP_URL'),
            "sub"=>$dbUser->email,
            "id"=>$dbUser->id,
            "exp"=>$date->getTimestamp()+(86400 * 7)
        ];

        return JWT::encode($payload, $secret, 'HS256');
    }

}
