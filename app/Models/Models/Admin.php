<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    
    // PUBLIC PROPERTIES - Có thể truy cập từ bên ngoài
    public $publicProperty = 'Đây là thuộc tính public';
    
    // PRIVATE PROPERTIES - Chỉ có thể truy cập từ bên trong class
    private $privateProperty = 'Đây là thuộc tính private';
    
    // PROTECTED PROPERTIES - Chỉ có thể truy cập từ class này và class con
    protected $protectedProperty = 'Đây là thuộc tính protected';
    
    // PUBLIC METHODS - Có thể gọi từ bên ngoài
    public function getPublicInfo()
    {
        return $this->publicProperty;
    }
    
    public function getPrivateInfo()
    {
        // Có thể truy cập private property từ bên trong class
        return $this->privateProperty;
    }
    
    public function setPrivateInfo($value)
    {
        // Có thể thay đổi private property từ bên trong class
        $this->privateProperty = $value;
        return $this;
    }
    
    // PRIVATE METHODS - Chỉ có thể gọi từ bên trong class
    private function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    private function encryptPassword($password)
    {
        return bcrypt($password);
    }
    
    // PUBLIC METHOD sử dụng PRIVATE METHODS
    public function createAdmin($name, $email, $password)
    {
        // Sử dụng private method để validate
        if (!$this->validateEmail($email)) {
            throw new \Exception('Email không hợp lệ');
        }
        
        // Sử dụng private method để mã hóa password
        $encryptedPassword = $this->encryptPassword($password);
        
        // Tạo admin mới
        $this->name = $name;
        $this->email = $email;
        $this->password = $encryptedPassword;
        
        return $this->save();
    }
    
    // PROTECTED METHODS - Chỉ có thể gọi từ class này và class con
    protected function getProtectedInfo()
    {
        return $this->protectedProperty;
    }
}
