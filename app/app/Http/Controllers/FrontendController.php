<?php

namespace App\Http\Controllers;
use App\Models\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categorys = Category::all();
        View::share('categorys',$categorys);
    }
}
