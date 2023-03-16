<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addStudentDetails extends Model
{
    use HasFactory;
    protected $table = "student_details";

    protected $fillable = [
		'student_id','phone_number', 'faculty', 'course','nationality', 'passport_number', 'passport_expire_date','passport_image', 'residence'
	];
}
