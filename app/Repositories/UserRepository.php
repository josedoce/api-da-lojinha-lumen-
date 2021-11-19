<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\interfaces\IUserRepo;
use Illuminate\Http\Request;

class UserRepository implements IUserRepo
{
    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function getAll()
    {
        return $this->userModel->all();
    }

    public function findWhereEmailIs($email){
        return $this->userModel->where('email',$email)->first();
    }

    public function get($id)
    {
        return $this->userModel->find($id);
    }

    public function store($data)
    {
        return $this->userModel->create($data);
    }

    public function update($id, $data)
    {
        return $this->userModel->where('id',$id)
        ->update($data);
    }

    public function destroy($id)
    {
        return $this->userModel->find($id)
            ->delete();
    }
}
