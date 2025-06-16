<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admins')->attempt($credentials)){
            return redirect()->route('admin.home');
        }else {
            session()->flash('success', 'Email hoặc mật khẩu không đúng.');
        }    
        return redirect()->back();
    }
    public function logoutAdmin(){
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
