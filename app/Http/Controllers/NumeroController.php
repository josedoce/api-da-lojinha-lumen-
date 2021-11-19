<?php

namespace App\Http\Controllers;

use App\Services\NumeroService;
use Illuminate\Http\Request;

class NumeroController extends Controller
{
    private $numero;
    public function __construct(NumeroService $numero)
    {
        $this->numero = $numero;
    }

    public function index()
    {
        return $this->numero->getAll();
    }

    public function show($id)
    {
        return $this->numero->get($id);
    }

    public function store(Request $request)
    {
        return $this->numero->store($request);
    }

    public function update($id, Request $request)
    {
        return $this->numero->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->numero->destroy($id);
    }

}
