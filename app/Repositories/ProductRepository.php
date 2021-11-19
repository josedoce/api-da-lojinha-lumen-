<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\interfaces\IProductRepo;

class ProductRepository implements IProductRepo
{
    private $productModel;
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getPaginateOrderedById($offset, $resultPerPage)
    {
        return $this->productModel->offset($offset)->limit($resultPerPage)->get();
    }

    public function getPaginateOrderedByValue($order, $offset, $resultPerPage)
    {
        return $this->productModel->orderByDesc($order)->offset($offset)->limit($resultPerPage)->get();
    }

    public function getCount()
    {
        return $this->productModel->count();
    }
}
