<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ShowcaseService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class ShowcaseController extends Controller
{
    private $showcaseService;
    public function __construct(ShowcaseService $showcaseService)
    {
        $this->showcaseService = $showcaseService;
    }

    public function home(Request $request){
        return $this->showcaseService->getHome($request);
    }

    public function page(Request $request, $category){
        return $this->showcaseService->getPage($request, $category);
    }
}
