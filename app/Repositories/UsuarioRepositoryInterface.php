<?php

namespace App\Repositories;

use Illuminate\Http\Request;

//é importante ter uma interface para abstrair.
interface UsuarioRepositoryInterface {
    public function getAll();
    public function get($id);
    public function store(Request $request);
    public function update($id, Request $request);
    public function destroy($id);
}
