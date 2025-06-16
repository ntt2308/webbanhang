<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestBanner;
use App\Models\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::paginate(10);
        $viewData = [
            'banners' => $banners
        ];
        return view('admin::banner.index', $viewData);
    }
    public function create()
    {
        return view('admin::banner.create');
    }
    public function store(RequestBanner $requestbanner)
    {
        $this->insertOrUpdate($requestbanner);

        return redirect()->route('admin.get.list.banner')->with('success', 'Thêm mới thành công');
    }
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin::banner.create', compact('banner'));
    }
    public function update(RequestBanner $requestbanner, $id)
    {
        $this->insertOrUpdate($requestbanner, $id);
        return redirect()->route('admin.get.list.banner')->with('success', 'Chỉnh sửa thành công');
    }
    public function insertOrUpdate($requestbanner, $id = '')
    {
        $banner = new Banner();

        if ($id) $banner = Banner::find($id);
        $banner->b_name = $requestbanner->b_name;
        $banner->b_image =  $requestbanner->b_image ? $requestbanner->b_image : $requestbanner->b_image;
        $banner->b_discount = $requestbanner->b_discount;
        $banner->save();
    }
    public function action($action, $id)
    {
        if ($action) {
            $banner = Banner::find($id);
            switch ($action) {
                case 'delete':
                    $banner->delete();
                    break;
                case 'active':
                    $banner->b_active = $banner->b_active ? 0 : 1;
                    break;
                case 'sale':
                    $banner->b_sale = $banner->b_sale ? 0 : 1;
                    break;     
            }
            $banner->save();
        }
        return redirect()->back();
    }
}
