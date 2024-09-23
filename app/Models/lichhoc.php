<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichhoc extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $primaryKey = 'session_id'; 
    protected $keyType = 'int';
    protected $fillable = ['session_id','class_id','session_day', 'end_day'];
    public $timestamps = false;
    public function lop()
    {
        return $this->belongsTo(lop::class, 'class_id', 'class_id');
    }
}
