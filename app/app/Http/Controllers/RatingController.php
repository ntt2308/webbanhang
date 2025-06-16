<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use App\Models\Models\Rating;
use App\Models\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function postRating(Request $request, $id){
        $productId = $request->ra_product_id;
        $userProduct = DB::table('oders')
        ->join('transactions', 'oders.od_transaction_id', '=', 'transactions.id')
        ->where('transactions.tr_user_id', get_data_user('web'))
        ->whereExists(function ($query) use ($productId) {
        $query->select(DB::raw(1))->from('oders')->whereRaw('oders.od_product_id = '.$productId);
    })->exists();
if (!$userProduct) {
    return redirect()->back()->with('danger', 'Bạn phải mua sản phẩm này trước khi đánh giá.');
}
        
    $existingRating = Rating::where('ra_user_id', get_data_user('web'))
    ->where('ra_product_id', $request->ra_product_id)->exists();
    if($existingRating) { 
        return redirect()->back()->with('warning', 'Bạn đã đánh giá sản phẩm này trước đó.');
    }
    $trt = Rating::create([
        'ra_user_id' => get_data_user('web'),
        'ra_number' => $request->ra_number,
        'ra_content' => $request->ra_content,
        'ra_product_id' => $request->ra_product_id 
    ]);
    
    if ($trt) {
        $product = Product::find($id); 
        if ($product) {
            $product->pro_total_number += $request->ra_number;
            $product->pro_total ++;
            $product->save();
        }
    }
        
    return redirect()->back()->with('success', 'Bạn đã đánh giá thành công.');
    }
}