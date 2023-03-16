<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentGuardian extends Model
{
    use HasFactory;
    protected $table = "student_guardian";

    protected $fillable = [
		'student_id', 'full_name', 'email', 'phone_number', 'status'
	];
}
