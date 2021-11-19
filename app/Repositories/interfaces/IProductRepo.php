<?php


namespace App\Repositories\interfaces;


interface IProductRepo
{
    public function getPaginateOrderedById($offset,$resultPerPage);
    public function getPaginateOrderedByValue($order,$offset,$resultPerPage);
    public function getCount();
}
