<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminWarehouseController extends Controller
{   
    public function getWarehouseProduct(Request $request){
    $products = Product::with('category:id,c_name');
    $column = 'id';
    if($request->type == 'pay'){
        $column = 'pro_pay';
    }else{
        $products->where('quantity','>',4);
    }
      if ($request->name) $products->where('pro_name', 'like', '%' . $request->name . '%');
      if ($request->cate) $products->where('pro_category_id', $request->cate);
      $products = $products->orderByDesc($column, 'DESC')->paginate(10);
      $categorys = $this->getCategory();
   
      $viewData = [
         'products' => $products,
         'categorys' => $categorys
      ];
        return view('admin::warehouse.index', $viewData);
    }
    public function getCategory()
   {
      return Category::all();
   }
}
