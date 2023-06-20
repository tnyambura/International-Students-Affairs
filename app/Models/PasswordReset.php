<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    protected $table = "password_reset";

    protected $fillable = [
		'user_id','token', 'current_pass', 'new_pass'
	];
}
