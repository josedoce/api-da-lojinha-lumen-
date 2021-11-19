<?php
namespace App\Repositories\interfaces;


interface IRankingRepo
{
    public function getAll();
    public function getAllPaginated($data,$index);
    public function get($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
