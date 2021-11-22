<?php


namespace App\Repositories\interfaces;


interface ICategoryRepo
{
    public function findAllProductsPerCategoryBySlug($slug,$offset,$resultPerPage,$order);
    public function findAllProductsPerCategoryById($id, $offset, $resultPerPage,$order);
}
