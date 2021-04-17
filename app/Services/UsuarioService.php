<?php

namespace App\Services;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Ramsey\Uuid\Uuid;
use Bcrypt\Bcrypt;
use Firebase\JWT\JWT;

class UsuarioService{

    private $usuarioRepository;
    public function __construct( RepositoryInterface $usuarioRepository)
    {
        /*terei que configurar o uso da classe que implementou esta interface
          no caso o UsuarioRepositoryEloquent em App\Providers\AppServiceProvider.php
        */
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll()
    {
        /*coloque codigos para validação aqui se quiser*/
        $usuarios = $this->usuarioRepository->getAll();
        try {
            if(count($usuarios)>0){
                return response()->json($this->usuarioRepository->getAll(), Response::HTTP_OK);
            }else{
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $th) {
            return response()->json(["error"=>"Erro de conexão com o banco de dados."], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get($id)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->usuarioRepository->get($id);
    }

    public function store(Request $request)
    {
        /*coloque codigos para validação aqui se quiser8*/
        $bcrypt = new Bcrypt();
        $senha = "12345";
        $hash = $bcrypt->encrypt("12345", '2a');
        $usuarioOk = $bcrypt->verify($senha, $hash)?"senha certa":"senha incorreta";

        $uuid = Uuid::uuid4();
        $chave = 'gatofoda';
        $dados = ['nome'=>'joseildo'];
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJub21lIjoiam9zZWlsZG8ifQ.ddCs5Kf9bO1I9qMWGwTDvBu1uWZ2a4OiMplxnwRG3K4';
        $jwt = JWT::encode($dados, $chave);

        $dec = JWT::decode($token,$chave, array('HS256'));

        return $dec;
        //return $this->usuarioRepository->store($request);
    }

    public function update($id, Request $request)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->usuarioRepository->update($id, $request);
    }

    public function destroy($id)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->usuarioRepository->destroy($id);
    }

}
