<?php
namespace App\Services;

use App\Exceptions\ApiException;
use App\Http\Responses\Promotion;
use App\Repositories\AnnouncementsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RankingRepository;
use App\Utils\PaginateGo;
use Illuminate\Http\Request;

class ShowcaseService
{
    private $rankingRepo;
    private $productRepo;
    private $categoryRepo;
    private $announcementsRepo;
    public function __construct(
        RankingRepository $rankingRepository,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        AnnouncementsRepository $announcementsRepository)
    {
        $this->rankingRepo= $rankingRepository;
        $this->productRepo= $productRepository;
        $this->categoryRepo = $categoryRepository;
        $this->announcementsRepo = $announcementsRepository;
    }

    public function getAll(){
        return $this->rankingRepo->getAll();
    }

    public function getPage(Request $request, $category){
        $ulp = $request->query('ulp',4);
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

        //relacionado a paginação.
        $page = $filter['p'];
        $resultPerPage = $filter['rp'];



        $orderRefactoring = $filter['order']!=null&&$filter['order']!=""?explode('-',$filter['order']):['asce',''];
        $order = $orderRefactoring[0];
        if($category == 'todos'){
            //create pagination all products
            $items = $this->productRepo->getCount();
            $paginate = new PaginateGo($page, $resultPerPage, $items);
            $paginate->setLinkPagesAvailable($paginate->getTotalPages());
            $offset = $paginate->getOffset();
            $resultPerPage = $paginate->getResultPerPage();
            //get all categories
            if($order == 'desc'){
                $products = $this->productRepo->getPaginateOrderedByValue($orderRefactoring[1],$offset, $resultPerPage);
            }elseif ($order == 'asce'){
                $products = $this->productRepo->getPaginateOrderedById($offset, $resultPerPage);
            }
        }elseif ($category != 'todos'){

            //create pagination per category
            $items = $this->categoryRepo->getCount('slug',$category);
            $paginate = new PaginateGo($page, $resultPerPage, $items);
            $paginate->setLinkPagesAvailable($paginate->getTotalPages());
            $offset = $paginate->getOffset();
            $resultPerPage = $paginate->getResultPerPage();
            //get per category
            $products = $this->categoryRepo->findAllProductsPerCategoryBySlug($category,$offset, $resultPerPage, ['asce'=>'id']);
        }

        $itemsInPage = count($products);

        $data = [
            'content'=> $products,
            'items_per_page'=> $itemsInPage,
            'next_page'=>$paginate->hasNext(),
            'count'=>$items,
            'pagination'=>$paginate->getLinkPagesAvailable($ulp),
            'current_page'=>$page,
            'total_pages'=>$paginate->getTotalPages(),
            'ordered'=>$orderRefactoring
        ];
        return response($data, 200);
    }

    public function getHome(Request $request){
        $promotionsDay = explode('-',$request->query('promotions_day'));
        $promotionsDayPage = $promotionsDay[0];
        $promotionsDayLimit = $promotionsDay[1];

        $mostSold = explode('-',$request->query('most_sold'));
        $motsSoldPage = $mostSold[0];
        $mostSoldLimit = $mostSold[1];

        $bestSellers = explode('-',$request->query('best_sellers'));
        $bestSellersPage = $bestSellers[0];
        $bestSellersLimit = $bestSellers[1];

        $appraised = explode('-',$request->query('appraised'));
        $appraisedPage = $appraised[0];
        $appraisedLimit = $appraised[1];

        $announcements = explode('-',$request->query('announcements'));
        $announcementsPage = $announcements[0];
        $announcementsLimit = $announcements[1];

        $ulp = $request->query('ulp');

        //getting home data
        $dataPromotionsDay = $this->getAllPromotionsDay($promotionsDayPage, $promotionsDayLimit, $ulp);
        $dataMostSold = $this->getAllMostSold($motsSoldPage, $mostSoldLimit, $ulp);
        $dataBestSellers = $this->getAllBestSellers($bestSellersPage, $bestSellersLimit, $ulp);
        $dataAppraised = $this->getAllAppraised($appraisedPage, $appraisedLimit, $ulp);
        $dataAnnouncements = $this->getAllAnnouncements($announcementsPage, $announcementsLimit, $ulp);

        $home = [
            'promotions_day'=>$dataPromotionsDay,
            'most_sold'=>$dataMostSold,
            'best_sellers'=>$dataBestSellers,
            'appraised'=>$dataAppraised,
            'announcements'=>$dataAnnouncements,
        ];
        return response($home, 200);
    }

    private function getAllPromotionsDay($page, $limit, $ulp=null)
    {
        $items = $this->rankingRepo->getCount('qualification','promotions_day');
        $paginate = new PaginateGo($page, $limit, $items);
        $paginate->setLinkPagesAvailable($paginate->getTotalPages());
        $offset = $paginate->getOffset();
        $resultPerPage = $paginate->getResultPerPage();

        //get products by ranking 'promotions_day' in db.
        $data = $this->rankingRepo->getAllPaginated(['qualification','promotions_day'], $offset, $resultPerPage);

        $data['take'] = $limit;
        $data['count'] = $items;
        $data['limit'] = $resultPerPage;
        if($ulp) $data['pagination'] = $paginate->getLinkPagesAvailable($ulp);
        $data['total_pages'] = $paginate->getTotalPages();
        $data['next_page'] = $paginate->hasNext();

        return $data;
    }

    private function getAllMostSold($page, $limit, $ulp=null)
    {
        $query = ['qualification','most_sold'];

        //paginate mechanism
        $items = $this->rankingRepo->getCount($query[0],$query[1]);
        $paginate = new PaginateGo($page, $limit, $items);
        $paginate->setLinkPagesAvailable($paginate->getTotalPages());
        $offset = $paginate->getOffset();
        $resultPerPage = $paginate->getResultPerPage();

        //get products by ranking 'most_sold' in db.
        $data = $this->rankingRepo->getAllPaginated($query, $offset, $resultPerPage);

        //response body
        $data['take'] = $limit;
        $data['count'] = $items;
        $data['limit'] = $resultPerPage;
        if($ulp) $data['pagination'] = $paginate->getLinkPagesAvailable($ulp);
        $data['total_pages'] = $paginate->getTotalPages();
        $data['next_page'] = $paginate->hasNext();
        return $data;
    }

    private function getAllBestSellers($page, $limit, $ulp=null)
    {
        $query = ['qualification', 'best_sellers'];
        $items = $this->rankingRepo->getCount($query[0],$query[1]);
        $paginate = new PaginateGo($page, $limit, $items);
        $paginate->setLinkPagesAvailable($paginate->getTotalPages());
        $offset = $paginate->getOffset();
        $resultPerPage = $paginate->getResultPerPage();

        //get products by ranking 'best_sellers' in db.
        $data = $this->rankingRepo->getAllPaginated($query, $offset , $resultPerPage);
        $data['take'] = $limit;
        $data['count'] = $items;
        $data['limit'] = $resultPerPage;
        if($ulp) $data['pagination'] = $paginate->getLinkPagesAvailable($ulp);
        $data['total_pages'] = $paginate->getTotalPages();
        $data['next_page'] = $paginate->hasNext();
        return $data;
    }

    private function getAllAppraised($page, $limit, $ulp=null)
    {
        $query = ['qualification','appraised'];
        $items = $this->rankingRepo->getCount($query[0], $query[1]);
        $paginate = new PaginateGo($page, $limit, $items);
        $paginate->setLinkPagesAvailable($paginate->getTotalPages());
        $offset = $paginate->getOffset();
        $resultPerPage = $paginate->getResultPerPage();

        //get products by ranking 'appraised' in db.
        $data = $this->rankingRepo->getAllPaginated($query, $offset , $resultPerPage);

        $data['take'] = $limit;
        $data['count'] = $items;
        $data['limit'] = $resultPerPage;
        if($ulp) $data['pagination'] = $paginate->getLinkPagesAvailable($ulp);
        $data['total_pages'] = $paginate->getTotalPages();
        $data['next_page'] = $paginate->hasNext();
        return $data;
    }

    private function getAllAnnouncements($page, $limit, $ulp=null)
    {
        $items = $this->announcementsRepo->getCount();
        $paginate = new PaginateGo($page, $limit, $items);
        $paginate->setLinkPagesAvailable($paginate->getTotalPages());
        $offset = $paginate->getOffset();
        $resultPerPage = $paginate->getResultPerPage();

        //get all products by announcements in db.
        $data = $this->announcementsRepo->getAllAnnouncementsProducts($offset, $resultPerPage);
        $data['take'] = $limit;
        $data['count'] = $items;
        $data['limit'] = $resultPerPage;
        if($ulp) $data['pagination'] = $paginate->getLinkPagesAvailable($ulp);
        $data['total_pages'] = $paginate->getTotalPages();
        $data['next_page'] = $paginate->hasNext();
        return $data;
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
