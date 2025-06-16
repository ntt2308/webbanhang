<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\ImportGoods;
use App\Models\Models\Product;
use App\Models\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminImportGoodsController extends Controller
{
    public function index()
    {
        $importgoods = ImportGoods::orderBy('id','DESC')->simplePaginate(10);
        $viewData = [
            'importgoods' => $importgoods
        ];
        return view('admin::import.index',$viewData);
    }
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin::import.create',compact('products','suppliers'));
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);

        return redirect()->route('admin.get.list.import')->with('success', 'Thêm mới thành công');
    }
    public function insertOrUpdate($request, $id = '')
    {
        $importgood = new ImportGoods();

        if ($id)  $importgood = ImportGoods::find($id);
        $importgood->product_id = $request->product_id;
        $importgood->supplier_id = $request->supplier_id;
        $importgood->quantity = $request->quantity;
        $importgood->price = $request->price;
        $importgood->save();

        $product = Product::find($request->product_id);
        if ($product) {
        $product->quantity += $request->quantity; 
        $product->save();
    }
}
    public function delete($id){
        $importgood = ImportGoods::findOrFail($id);
        $importgood->delete();
        return redirect()->back()->with('success','Xoá thành công');
}
}