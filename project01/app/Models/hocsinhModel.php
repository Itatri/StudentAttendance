<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocSinhModel extends Model
{
    use HasFactory;

    protected $table = 'students'; // Table name
    protected $primaryKey = 'student_id'; // Primary key
    protected $keyType = 'int'; // Primary key type
    protected $fillable = ['student_id', 'user_id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'education_level', 'training_type', 'major', 'address', 'phone_number', 'img']; // Fillable columns
    public $timestamps = false; // Disable timestamps

    // Define the relationship with attendance records
    public function attendanceRecords()
    {
        return $this->hasMany(DiemDanh::class, 'student_id', 'student_id');
    }
}
