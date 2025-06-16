<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Admin;
use App\Models\Models\Cart;
use App\Models\Models\Order;
use App\Models\Models\Product;
use App\Models\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
        if(!$request->l){
            $transactions = Transaction::orderBy('id', 'DESC')->simplePaginate(10);
        } else {
            $transactions = Transaction::where('tr_phone','like','%'.$request->l.'%')->simplePaginate(10);
        }
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index', $viewData);
}
    
    public function viewOder($id){
        $orders = Order::with('products')->where('od_transaction_id', $id)->get();
        $viewData = [
            'orders' => $orders
        ];
        return view('admin::transaction.view', $viewData);
    }
    public function actionTransaction($id){
        $transaction = Transaction::find($id);
        $orders = Order::where('od_transaction_id', $id)->get();
        if($orders->isNotEmpty()) {
            foreach($orders as $order) {
                $product = Product::find($order->od_product_id);
                if($product) {
                    $product->quantity = $product->quantity - $order->od_quantity;
                    $product->pro_pay += $order->od_quantity;
                    $product->save();
                }
            }
        
        }
        DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success','Xử lí đơn hàng thành công');
    }
    public function deleteTransacction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('success','Xoá đơn hàng thành công');
    }
    public function edit($id){
        $transaction = Transaction::find($id);
        if(!$transaction) {
            return redirect()->back();
        }
        return view('admin::transaction.update', compact('transaction'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'tr_status' => 'required|string|max:255',
        ]);
        $transaction = Transaction::findOrFail($id);
        $transaction->tr_status = $request->tr_status;
        $transaction->save();
        return redirect()->route('admin.get.list.transaction')->with('success','Chỉnh sửa trạng thái thành công');
    }
}
