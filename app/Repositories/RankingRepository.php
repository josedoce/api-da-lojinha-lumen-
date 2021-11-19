<?php


namespace App\Repositories;


use App\Models\Ranking;
use App\Repositories\interfaces\IRankingRepo;

class RankingRepository implements IRankingRepo
{
    private $rankingModel;
    public function __construct(Ranking $ranking)
    {
        $this->rankingModel = $ranking;
    }

    public function getAll()
    {
        return $this->rankingModel->all();
    }

    public function getAllPaginated($data,$index){
        return $this->rankingModel->where($data[0], $data[1])->paginate($index);
    }
    public function get($id)
    {
        return $this->rankingModel->find($id);
    }

    public function store($data)
    {
        return $this->rankingModel->create($data);
    }

    public function update($id, $data)
    {
        return $this->rankingModel->where('id',$id)
            ->update($data);
    }

    public function destroy($id)
    {
        return $this->rankingModel->find($id)
            ->delete();
    }
}
