<?php

namespace App\Services;

use App\Repositories\RepositoryInterfaceNumero;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NumeroService{

    private $numeroRepository;
    public function __construct( RepositoryInterfaceNumero $numeroRepository)
    {
        /*terei que configurar o uso da classe que implementou esta interface
          no caso o numeroRepositoryEloquent em App\Providers\AppServiceProvider.php
        */
        $this->numeroRepository = $numeroRepository;
    }

    public function getAll()
    {
        /*coloque codigos para validação aqui se quiser*/
        $numeros = $this->numeroRepository->getAll();
        try {
            if(count($numeros)>0){
                return response()->json($this->numeroRepository->getAll(), Response::HTTP_OK);
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
        return $this->numeroRepository->get($id);
    }

    public function store(Request $request)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->numeroRepository->store($request);
    }

    public function update($id, Request $request)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->numeroRepository->update($id, $request);
    }

    public function destroy($id)
    {
        /*coloque codigos para validação aqui se quiser*/
        return $this->numeroRepository->destroy($id);
    }

}
