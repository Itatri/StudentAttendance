<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giaovien extends Model
{
    use HasFactory;

    protected $table = 'teachers'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'teacher_id'; // Khóa chính của bảng
    public $timestamps = false; // Bỏ qua trường thời gian tự động

    // Các trường có thể được gán hoặc cập nhật
    protected $fillable = [
        'teacher_id',
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'education_level',
        'address',
        'phone_number',
        'img'
    ];
}
