<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categorys = Category::select('id','c_name','c_active','c_parent')-> get();
        $viewData = [
            'categorys' => $categorys
        ];
        return view('admin::category.index',$viewData);
    }
    public function create()
    {
        $categorys = Category::where('c_parent',0)->get();
        $viewData = [
            'categorys' => $categorys
        ];
        return view('admin::category.create',$viewData);
    }
    public function store(RequestCategory $requestCategory){
        $this->insertOrUpdate($requestCategory);

        return redirect()->route('admin.get.list.category')->with('success', 'Thêm mới thành công');

    }
    public function edit($id){
        $category = Category::find($id);
        if(!$category) {
            return redirect()->back();
        }
        $categories = Category::where('c_parent', 0)->get();
        return view('admin::category.update',compact('category','categories'));
    }
    public function update(RequestCategory $requestCategory, $id){
        $this->insertOrUpdate($requestCategory,$id);
        return redirect()->route('admin.get.list.category')->with('success', 'Cập nhật danh mục thành công');;
    }

    public function insertOrUpdate($requestCategory, $id= ''){
        $category = new Category();
        if ($id) $category = Category::find($id);
        $category->c_name = $requestCategory->name;
        $category->c_slug = str_slug($requestCategory->name);
        $category->c_parent = $requestCategory->c_parent;
        $category->save();
        }

    public function action( $action,$id){
        $mesages = '';
        if($action){
            $category = Category::find($id);
            switch($action){
                case 'delete':
                    $category->delete();
                    $mesages = 'Xoá dữ liệu thành công';
                    break;
                 case 'active':
                    $category->c_active = $category->c_active ? 0: 1;
                    $category->save();
                    break;
            }
        }
        return redirect()->back()->with('success',$mesages);
    }
}
