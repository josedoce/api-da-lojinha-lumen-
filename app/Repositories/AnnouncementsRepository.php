<?php


namespace App\Repositories;


use App\Models\Announcements;
use App\Repositories\interfaces\IAnnouncementsRepo;

class AnnouncementsRepository implements IAnnouncementsRepo
{
    private $announcementsModel;
    public function __construct(Announcements $announcementsModel)
    {
        $this->announcementsModel = $announcementsModel;
    }

    public function getAllAnnouncementsProducts($offset, $limit)
    {
        $productsList = $this->announcementsModel->offset($offset)->limit($limit)->get();
        $productArray = [];
        foreach ($productsList as $product){
            array_push($productArray, $product->product);
        }
        return ['data'=>$productArray];
    }

    public function getCount(): int{
        return $this->announcementsModel->count();
    }
}
