<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Số lượng người dùng bạn muốn tạo
        $numberOfUsers = 3;

        // Vòng lặp để tạo người dùng
        for ($i = 1; $i <= $numberOfUsers; $i++) {
            DB::table('users')->insert([
                'username' => 'user'.$i,
                'email' => 'user'.$i.'@example.com',
                'password_hash' => Hash::make('password'), // Mã hóa mật khẩu với Bcrypt
                'role' => 'ADMIN',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
