<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\interfaces\ICategoryRepo;

class CategoryRepository implements ICategoryRepo
{
    private $categoryModel;
    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    public function findAllProductsPerCategoryBySlug($slug, $offset=null, $resultPerPage=null, $order=null)
    {
        return $this->getProducts(['slug',$slug], $offset, $resultPerPage, $order);
    }

    public function findAllProductsPerCategoryById($id, $offset=null, $resultPerPage=null, $order=null)
    {
       return $this->getProducts(['id',$id], $offset, $resultPerPage);
    }

    public function getCount($column, $cell): int
    {
        $count = $this->categoryModel->where($column, $cell)->first();
        return $count->products()->count();
    }

    private function getProducts($data, $offset, $limit, $order = ['asce'=>'id']){
        $category = $this->categoryModel->where($data[0], $data[1])->first();

        if(array_key_exists('asce', $order)){
            $products = $category->products()->offset($offset)->limit($limit)->get();
        }else if(array_key_exists('desc', $order)){
            $products = $category->products()->orderByDesc($order['desc'])->offset($offset)->limit($limit)->get();
        }

        return $products;
    }


}
