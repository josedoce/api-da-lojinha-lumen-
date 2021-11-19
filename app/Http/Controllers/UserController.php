<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\UserService;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class UserController extends Controller {
    private $userRepository;
    private $userService;
    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }
    public function getAllUsers(){
        return $this->userRepository->getAll();
    }

    public function getOneUser(Request $request){
        $user = JWT::decode($request->bearerToken(), env('APP_KEY'),['HS256']);
        return $this->userRepository->findWhereEmailIs($user->sub);
    }

    public function signUp(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'name.required'=>'Name is required.',
            'email.required'=>'E-mail is required.',
            'password.required'=>'Password is required.'
        ]);

        return $this->userService->registerUser($request);
    }

    public function signIn(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|string',
            'remember'=>'required'
        ],[
            'email.required'=>'E-mail is required.',
            'password.required'=>'Name is required.',
            'remember.required'=>'remember is required.'
        ]);
        return $this->userService->userSignIn($request);
    }

    public function signOut(Request $request){
        $this->validate($request,[
            'id'=>'required'
        ],[
            'id.required'=>'Id is required.',
        ]);

        return $this->userService->userSignOut($request);
    }
}
