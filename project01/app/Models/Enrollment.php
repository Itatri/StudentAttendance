<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollments'; // Table name
    protected $primaryKey = 'enrollment_id'; // Primary key
    protected $keyType = 'int'; // Primary key type
    protected $fillable = ['enrollment_id', 'class_id', 'student_id']; // Fillable columns
    public $timestamps = false; // Disable timestamps

    // Define the relationship with the 'classes' (Lop)
    public function class()
    {
        return $this->belongsTo(Lop::class, 'class_id', 'class_id');
    }

    // Define the relationship with the 'students' (HocSinhModel)
    public function student()
    {
        return $this->belongsTo(HocSinhModel::class, 'student_id', 'student_id');
    }
}
