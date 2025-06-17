<?php

namespace App\Http\Controllers;

use App\Models\Models\Article;
use App\Models\Models\Banner;
use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $startOfPeriod = Carbon::now()->subDays(30)->startOfDay();
        $endOfPeriod = Carbon::now()->endOfDay();
        $productHot = Product::where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();
        // $banners = Banner::where([
        //     'b_active' => Banner::STATUS_PUBLIC
        // ])->limit(10)->get();
        // $bannersales= Banner::where([
        //     'b_sale' => Banner::SALE_ON
        // ])->limit(10)->get();
        $articleNews = Article::where([
            'a_active' => Product::STATUS_PUBLIC
        ])->limit(10)->get();
        $productNew = Product::orderBy('id','DESC')->get();
        $productSelling = Product::where('created_at', '>=', [$startOfPeriod, $endOfPeriod],)->where('pro_pay', '>', 3)->orderBy('pro_pay','DESC')->limit(10)->get();
        $viewData = [
            'productHot' => $productHot,
            // 'banners' => $banners,
            // 'bannersales'=>$bannersales,
            'articleNews'=>$articleNews,
            'productNew' => $productNew,
            'productSelling' => $productSelling
        ];
        return view('home.index', $viewData);
    }
}

