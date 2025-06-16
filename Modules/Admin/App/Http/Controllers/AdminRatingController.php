<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $ratings = Rating::with('product:id,pro_name', 'user:id,name,phone')->orderBy('id','DESC')->simplePaginate(6);
        $viewData = [
            'ratings'=> $ratings
        ];
        return view('admin::rating.index', $viewData);
    }
    public function delete($id){
        $rating = Rating::findOrFail($id);

        $rating->delete();
        return redirect()->back()->with('success','Xoá đánh giá thành công');
    }
}
