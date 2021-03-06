<?php
/*
    O repositorio ajuda na hora de organizar o controller.
*/
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Usuario; //usaremos esse modelo no repositorio.

class UsuarioRepositoryEloquent implements RepositoryInterface{
    private $model;

    public function __construct(Usuario $usuario)
    {
        $this->model = $usuario;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function store(Request $request)
    {
        return $this->model->create($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->model->find($id)
            ->update($request->all());
    }

    public function destroy($id)
    {
        return $this->model->find($id)
            ->delete();
    }
}
