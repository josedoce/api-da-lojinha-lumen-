<?php
namespace App\Services;

use App\Exceptions\ApiException;
use App\Repositories\ProductRepository;
use App\Repositories\RankingRepository;
use Illuminate\Http\Request;

class ShowcaseService
{
    private $rankingRepo;
    private $productRepo;
    public function __construct(RankingRepository $rankingRepository,ProductRepository $productRepository)
    {
        $this->rankingRepo= $rankingRepository;
        $this->productRepo= $productRepository;
    }

    public function getAll(){
        return $this->rankingRepo->getAll();
    }

    public function getPage(Request $request, $category){
        $page = $this->makeValidValueNumeric($request->query('p'));
        $resultPerPage = $this->makeValidValueNumeric($request->query('rp'));
        $category = !is_numeric($category)?$category:'todos';
        $order = !is_numeric($request->query('order'))?$request->query('order'):'asce-id';
        $filter = [
            'p'=>$page,
            'rp'=>$resultPerPage
        ];

        $this->validateInput($filter);
        $filter['category']=$category;
        $filter['order']=$order;
        $page = $filter['p'];
        $resultPerPage = $filter['rp'];

        if($page<0 || $page == 1 || $page=='' || !is_numeric($page)){
            $offset = 0;
        }else {
            $offset = ($page - 1)*$resultPerPage;
        }

        $items = $this->productRepo->getCount();
        if($resultPerPage < 1 || $resultPerPage > $items || $resultPerPage > 80){
            $resultPerPage = 20;
        }


        $orderRefactoring = $filter['order']!=null&&$filter['order']!=""?explode('-',$filter['order']):['asce',''];
        $order = $orderRefactoring[0];

        if($order == 'desc'){
            $products = $this->productRepo->getPaginateOrderedByValue($orderRefactoring[1],$offset, $resultPerPage);
        }elseif ($order == 'asce'){
            $products = $this->productRepo->getPaginateOrderedById($offset, $resultPerPage);
        }

        $itemsInPage = count($products);
        $totalPerPage = ceil($items / $resultPerPage);
        if($page >= $totalPerPage){
            $hasNext = false;
        }else{
            $hasNext = true;
        }
        $data = [
            'content'=> $products,
            'items_page'=> $itemsInPage,
            'next_page'=>$hasNext,
            'count'=>$items,
            'current_page'=>$page,
            'total_pages'=>$totalPerPage,
            'ordered'=>$orderRefactoring
        ];
        return response($data, 200);
    }

    public function getHome(Request $request){ //fica pra amanhã
        $promotionsDay = $this->makeValidValueNumeric($request->query('promotions_day'));
        $mostSold = $this->makeValidValueNumeric($request->query('most_sold'));
        $bestSellers = $this->makeValidValueNumeric($request->query('best_sellers'));
        $appraised = $this->makeValidValueNumeric($request->query('appraised'));
        $announcements = $this->makeValidValueNumeric($request->query('announcements'));
        $query = [
            'promotions_day'=> $promotionsDay,
            'most_sold'=> $mostSold,
            'best_sellers'=>$bestSellers,
            'appraised'=>$appraised,
            'announcements'=>$announcements,
        ];

        $this->validateInput($query);

        $home = [
            'promotions_day'=>['data'=>$this->getAllPromotionsDay($promotionsDay), 'take'=>$promotionsDay],
            'most_sold'=>['data'=>[], 'take'=>$mostSold],
            'best_sellers'=>['data'=>[], 'take'=>$bestSellers],
            'appraised'=>['data'=>[], 'take'=>$appraised],
            'announcements'=>['data'=>[], 'take'=>$announcements],
        ];
        return response($home, 200);
    }

    private function getAllPromotionsDay($index){
        return $this->rankingRepo->getAllPaginated(['promotions_day',1], $index);
    }

    private function validateInput($data){
        $error = false;
        foreach ($data as $item) {
            if($item == null){

            }elseif (!is_numeric($item)){
                $error = true;
                break;
            }
        }
        if($error){
            throw new ApiException('Query isn\'t numeric.', 400);
        }
    }

    private function makeValidValueNumeric($value){
        return $value!=""&&$value!=null&&$value>0?$value:'5';
    }
}
