<?php
namespace App\Repositories\interfaces;

interface IUserRepo
{
    public function getAll();
    public function get($id);
    public function findWhereEmailIs($email);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
