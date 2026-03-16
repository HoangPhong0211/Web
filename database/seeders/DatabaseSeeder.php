<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// Quan trọng: Phải import Role của Spatie
use Spatie\Permission\Models\Role; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Tạo các vai trò trước
        // Sử dụng firstOrCreate để tránh lỗi nếu chạy Seeder nhiều lần
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        // 2. Tạo User Admin và gán Role ngay lập tức
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Kiểm tra nếu email đã tồn tại
            [
                'name' => 'Administrator',
                'password' => bcrypt('123456'), // Mật khẩu mẫu cho bạn test
            ]
        );
        
        // Gán quyền admin cho user này
        $admin->assignRole($adminRole);

        // 3. Tạo thêm User test nếu cần
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}