<?php


namespace App\Repositories\interfaces;


interface IAnnouncementsRepo
{
    public function getAllAnnouncementsProducts($offset, $limit);
}
