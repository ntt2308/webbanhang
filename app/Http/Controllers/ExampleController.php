<?php

namespace App\Http\Controllers;

use App\Models\Models\Admin;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // PUBLIC METHODS - Có thể gọi từ routes
    public function index()
    {
        return view('example.index');
    }
    
    public function createAdmin(Request $request)
    {
        // Validate input
        $this->validateAdminData($request);
        
        // Create admin using private method
        $admin = $this->createNewAdmin($request);
        
        return response()->json([
            'success' => true,
            'message' => 'Tạo admin thành công',
            'admin' => $admin
        ]);
    }
    
    public function getAdminInfo($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Sử dụng private method để format data
        $formattedData = $this->formatAdminData($admin);
        
        return response()->json($formattedData);
    }
    
    // PRIVATE METHODS - Chỉ có thể gọi từ bên trong class
    private function validateAdminData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:6'
        ]);
    }
    
    private function createNewAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->phone = $request->phone;
        $admin->save();
        
        return $admin;
    }
    
    private function formatAdminData(Admin $admin)
    {
        return [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'phone' => $admin->phone,
            'created_at' => $admin->created_at->format('Y-m-d H:i:s')
        ];
    }
    
    // PROTECTED METHODS - Chỉ có thể gọi từ class này và class con
    protected function getAdminStats()
    {
        return [
            'total_admins' => Admin::count(),
            'active_admins' => Admin::where('active', 1)->count(),
            'recent_admins' => Admin::latest()->take(5)->get()
        ];
    }
} 