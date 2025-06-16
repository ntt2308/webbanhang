<?php

namespace App\Http\Controllers;

use App\Models\Models\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $transactions = Transaction::orderBy('id','DESC')->where('tr_user_id', get_data_user('web'))->simplePaginate(8);
        $totalTransaction = Transaction::where('tr_user_id', get_data_user('web'))
        ->select('id')->count();
        
        $totalTransactionDone = Transaction::where('tr_user_id', get_data_user('web'))
        ->where('tr_status',Transaction::STATUS_DONE)->select('id')->count();
        $viewData = [
            'totalTransaction'=> $totalTransaction,
            'totalTransactionDone'=> $totalTransactionDone,
            'transactions'=> $transactions
        ];
        return view('user.index',$viewData);
    }
}
