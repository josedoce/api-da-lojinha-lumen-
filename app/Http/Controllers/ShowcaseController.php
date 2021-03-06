<?php
namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Category;
use App\Models\Product;
use App\Models\Ranking;
use App\Repositories\AnnouncementsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Services\ShowcaseService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;


class ShowcaseController extends Controller
{
    private $showcaseService;
    private $categoryRepo;
    private $productRepo;
    private $announcementsRepo;
    public function __construct(ShowcaseService $showcaseService, CategoryRepository $categoryRepository, ProductRepository $productRepository, AnnouncementsRepository $announcementsRepository)
    {
        $this->showcaseService = $showcaseService;
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
        $this->announcementsRepo = $announcementsRepository;
    }

    public function test(){
        //$category = Category::where('slug','utilidades-domesticas')->first();
        //$category->products;

        //$category = $this->categoryRepo->findAllProductsPerCategoryBySlug('utilidades-domesticas',0, 2, ['asce'=>'id']);
        //$category = $this->categoryRepo->getCount('slug','utilidades-domesticas');
        //$ranking = Ranking::where('qualification','most_sold')->first();
        //$count = $ranking->products()->count();
        //$products = $ranking->products()->offset(0)->limit(4)->get();
        //return response(['products'=>$products,'t'=>$count], 200);
        //$produtct = $this->productRepo->getPaginateOrderedById(1, 10);

        //pegando o produto acompanhado do seu anuncio
        $announcement = Product::find(21)->announcement;


        //pegando o anuncio acompanhado do produto
        $produto = Announcements::find(1)->product;


        //pegando uma lista de anuncios e seus respectivos produtos
        //$listaProdutos = Announcements::offset(1)->limit(1)->get();

        $productObj = $this->announcementsRepo->getAllAnnouncementsProducts(1, 1);

        return response(['produtos'=>[$announcement, $produto],'lista_produtos'=>[$productObj], 'count'=>$this->announcementsRepo->getCount()],200);
    }

    public function home(Request $request){
        define("HOME_REGEX", 'regex:/^[0-9]{1,6}-[0-9]{1,2}$/');
        $this->validate($request,[
            'ulp'=>'integer|min:1|max:12',
            'promotions_day'=>HOME_REGEX,
            'most_sold'=>HOME_REGEX,
            'best_sellers'=>HOME_REGEX,
            'appraised'=>HOME_REGEX,
            'announcements'=>HOME_REGEX,
        ],[
            'ulp.integer'=>'The \'ulp\' must be an integer.',
            'ulp.max'=>'The \'ulp\' must have between 1 and :max.',
            'ulp.min'=>'The \'ulp\' must have between :min and 12.',
            'promotions_day.regex'=>'The \'promotions_day\' must have between 0-99 == ?p=[page-limit]',
            'most_sold.regex'=>'The \'most_sold\' must have between 0-99 == ?p=[page-limit]',
            'best_sellers.regex'=>'The \'best_sellers\' must have between 0-99 == ?p=[page-limit]',
            'appraised.regex'=>'The \'appraised\' must have between 0-99 == ?p=[page-limit]',
            'announcements.regex'=>'The \'announcements\' must have between 0-99 == ?p=[page-limit]',
        ]);

        return $this->showcaseService->getHome($request);
    }

    public function page(Request $request, $category = 'todos'){
        define('PAGE_REGEX','regex:/^[0-9]{1,2}$/');

        $this->validate($request, [
            'ulp'=>'integer|min:1|max:12',
            'rp'=>PAGE_REGEX,
            'p'=>'regex:/^[0-9]{1,6}$/',
            'order'=>array('regex:/^(desc|asce)-[a-z|A-Z]+$/')
        ],[
            'ulp.max'=>'The \'ulp\' must have between 1 and :max.',
            'ulp.integer'=>'The \'ulp\' must be an integer.',
            'rp.regex'=>'The \'rp(result per page)\' must have between 0-99 == ?rp=[99]',
            'p.regex'=>'The \'p(page)\' must have between 0-999999 and must be an integer',
        ]);
        $hasCategory = $this->categoryRepo->hasCategory($category);
        if(!$hasCategory) {
            return response(['category'=>'The \''.$category.'\' don\'t exist.'],404);
        }

        return $this->showcaseService->getPage($request, $category);
    }
}
