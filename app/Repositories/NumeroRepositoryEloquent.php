<?php
    namespace App\Repositories;

use App\Models\Numero;
use IlLuminate\Http\Request;

class NumeroRepositoryEloquent implements RepositoryInterfaceNumero{
    private $model;

    public function __construct(Numero $numero)
    {
        $this->model = $numero;
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
