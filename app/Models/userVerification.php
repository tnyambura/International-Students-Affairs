<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userVerification extends Model
{
    use HasFactory;
    protected $table = "user_verification";

    protected $fillable = [
		'user_id', 'status','verified_at', 'remember_token', 'created_at', 'updated_at'
	];
}