<?php

// Ví dụ sử dụng Public và Private trong PHP

// 1. PUBLIC - Có thể truy cập từ bên ngoài
echo "=== PUBLIC PROPERTIES & METHODS ===\n";

$admin = new \App\Models\Models\Admin();

// ✅ CÓ THỂ truy cập public property
echo "Public property: " . $admin->publicProperty . "\n";

// ✅ CÓ THỂ gọi public method
echo "Public method result: " . $admin->getPublicInfo() . "\n";

// ✅ CÓ THỂ gọi public method để lấy private info
echo "Private info via public method: " . $admin->getPrivateInfo() . "\n";

// ✅ CÓ THỂ gọi public method để set private info
$admin->setPrivateInfo('Giá trị mới cho private property');
echo "Private info sau khi thay đổi: " . $admin->getPrivateInfo() . "\n";

// ✅ CÓ THỂ gọi public method để tạo admin
try {
    $admin->createAdmin('Admin Test', 'test@gmail.com', 'password123');
    echo "Tạo admin thành công!\n";
} catch (\Exception $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}

echo "\n";

// 2. PRIVATE - KHÔNG thể truy cập từ bên ngoài
echo "=== PRIVATE PROPERTIES & METHODS ===\n";

// ❌ KHÔNG THỂ truy cập private property trực tiếp
// $admin->privateProperty; // Sẽ gây lỗi Fatal error

// ❌ KHÔNG THỂ gọi private method trực tiếp
// $admin->validateEmail('test@gmail.com'); // Sẽ gây lỗi Fatal error

// ❌ KHÔNG THỂ gọi private method trực tiếp
// $admin->encryptPassword('password123'); // Sẽ gây lỗi Fatal error

echo "Không thể truy cập private properties/methods từ bên ngoài class\n";

echo "\n";

// 3. PROTECTED - Chỉ có thể truy cập từ class con
echo "=== PROTECTED PROPERTIES & METHODS ===\n";

// ❌ KHÔNG THỂ truy cập protected property trực tiếp
// $admin->protectedProperty; // Sẽ gây lỗi Fatal error

// ❌ KHÔNG THỂ gọi protected method trực tiếp
// $admin->getProtectedInfo(); // Sẽ gây lỗi Fatal error

echo "Không thể truy cập protected properties/methods từ bên ngoài class\n";

echo "\n";

// 4. Ví dụ class con kế thừa
echo "=== INHERITANCE EXAMPLE ===\n";

class SuperAdmin extends \App\Models\Models\Admin
{
    public function testProtectedAccess()
    {
        // ✅ CÓ THỂ truy cập protected property từ class con
        echo "Protected property từ class con: " . $this->protectedProperty . "\n";
        
        // ✅ CÓ THỂ gọi protected method từ class con
        echo "Protected method từ class con: " . $this->getProtectedInfo() . "\n";
        
        // ❌ VẪN KHÔNG THỂ truy cập private property
        // echo $this->privateProperty; // Sẽ gây lỗi
        
        // ❌ VẪN KHÔNG THỂ gọi private method
        // $this->validateEmail('test@gmail.com'); // Sẽ gây lỗi
    }
}

$superAdmin = new SuperAdmin();
$superAdmin->testProtectedAccess();

echo "\n";

// 5. Thực tế trong Laravel
echo "=== LARAVEL REAL-WORLD EXAMPLE ===\n";

// Trong Laravel, các thuộc tính thường được khai báo như sau:
class ExampleModel extends \Illuminate\Database\Eloquent\Model
{
    // PUBLIC - Có thể truy cập từ bên ngoài
    public $timestamps = true;
    
    // PROTECTED - Chỉ có thể truy cập từ bên trong class và class con
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
    protected $casts = ['email_verified_at' => 'datetime'];
    
    // PRIVATE - Chỉ có thể truy cập từ bên trong class
    private $secretKey = 'very-secret-key';
    
    // PUBLIC METHODS - API cho bên ngoài
    public function getSecretKey()
    {
        return $this->secretKey;
    }
    
    // PRIVATE METHODS - Logic nội bộ
    private function validateSecretKey($key)
    {
        return $key === $this->secretKey;
    }
    
    // PUBLIC METHOD sử dụng PRIVATE METHOD
    public function authenticate($key)
    {
        return $this->validateSecretKey($key);
    }
}

echo "Trong Laravel, chúng ta thường sử dụng:\n";
echo "- PUBLIC: cho các thuộc tính cần truy cập từ bên ngoài\n";
echo "- PROTECTED: cho các thuộc tính Eloquent (fillable, hidden, casts)\n";
echo "- PRIVATE: cho logic nội bộ và bảo mật\n"; 