<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuoiHoc extends Model
{
    use HasFactory;

    protected $table = 'sessions'; // Table name
    protected $primaryKey = 'session_id'; // Primary key
    protected $keyType = 'int'; // Primary key type
    protected $fillable = ['session_id', 'class_id', 'session_date', 'end_time']; // Fillable columns
    public $timestamps = false; // Disable timestamps

    // Define the relationship with the 'lop' (class) model
    public function lop()
    {
        return $this->belongsTo(Lop::class, 'class_id', 'class_id');
    }

    // Define the relationship with attendance records
    public function attendanceRecords()
    {
        return $this->hasMany(DiemDanh::class, 'session_id', 'session_id');
    }
}
