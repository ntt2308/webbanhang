<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Admin;
use App\Models\Models\User as ModelsUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userss = User::whereRaw(1);
        $userss = $userss->orderBy('id','DESC')->paginate(10);

        $viewData = [
            'userss'=>$userss
        ];
        return view('admin::user.index',$viewData);
    }
    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','Xoá tài khoản thành công');
    }
   
    //tài khoản admin
    public function indexAdmin()
    {   
        $admins= Admin::orderBy('id','DESC')->paginate(10);
        $viewData = [
            'admins'=>$admins
        ];
        return view('admin::account.index',$viewData);
    }
    public function create()
    {
        return view('admin::account.create');
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);

        return redirect()->route('account.index')->with('success','Thêm tài khoản thành công');
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin::account.update', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return redirect()->route('account.index')->with('success','Chỉnh sửa tài khoản thành công');
    }
    public function insertOrUpdate($request, $id = '')
    {   $this->validate($request, [
        'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i',
        'password' => 'required|min:6'
    ], [
        'email.required' => 'Bạn chưa nhập email.',
        'email.email' => 'Email không đúng định dạng.',
        'email.regex' => 'Email phải là địa chỉ Gmail.',
        'password.required' => 'Bạn chưa nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.'
    ]);
        $admin = new Admin();

        if ($id) $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email =  $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->back();
    }
    public function deletea($id){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('success','Xoá tài khoản thành công');
    }
   
}
