<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Table name
    protected $primaryKey = 'class_id'; // Primary key
    protected $keyType = 'int'; // Primary key type
    protected $fillable = ['class_id', 'course_id', 'teacher_id', 'class_name', 'semester', 'start_day', 'end_day']; // Fillable columns
    public $timestamps = false; // Disable timestamps

    // Define the relationship with 'sessions' (BuoiHoc)
    public function sessions()
    {
        return $this->hasMany(BuoiHoc::class, 'class_id', 'class_id');
    }

    // Define the relationship with enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'class_id', 'class_id');
    }
    public function student()
    {
        return $this->belongsTo(HocSinhModel::class, 'student_id', 'student_id');
    }
    public function teacher()
    {
        return $this->belongsTo(giaovien::class, 'teacher_id');
    }

}
