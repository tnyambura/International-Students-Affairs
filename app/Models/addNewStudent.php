<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addNewStudent extends Model
{
    use HasFactory;
    protected $table = "users";

    protected $fillable = [
		'id', 'surname','other_names', 'email', 'password','status'
	];
}
