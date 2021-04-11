<?php

namespace App\Services;

use App\Repositories\UsuarioRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioService{

    private $usuarioRepository;
    public function __construct( UsuarioRepositoryInterface $usuarioRepository)
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
        /*coloque codigos para validação aqui se quiser*/
        return $this->usuarioRepository->store($request);
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
