<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    use HasFactory;

    protected $table = 'attendance_records'; // Table name
    protected $primaryKey = 'attendance_id'; // Primary key
    protected $keyType = 'int'; // Primary key type
    protected $fillable = ['attendance_id', 'student_id', 'session_id', 'status']; // Fillable columns
    public $timestamps = false; // Disable timestamps

    // Define the relationship with 'sessions' (BuoiHoc)
    public function session()
    {
        return $this->belongsTo(BuoiHoc::class, 'session_id', 'session_id');
    }

    // Define the relationship with 'students'
    public function student()
    {
        return $this->belongsTo(HocSinhModel::class, 'student_id', 'student_id');
    }
}
