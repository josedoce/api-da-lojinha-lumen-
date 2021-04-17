<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $usuario;
    public function __construct(UsuarioService $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index()
    {
        return $this->usuario->getAll();
    }

    public function show($id)
    {
        return $this->usuario->get($id);
    }

    public function store(Request $request)
    {
        return $this->usuario->store($request);
    }

    public function update($id, Request $request)
    {
        return $this->usuario->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->usuario->destroy($id);
    }

}
