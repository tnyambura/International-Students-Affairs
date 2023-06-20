<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionUpdate extends Model
{
    use HasFactory;
    protected $table = "session";

    protected $fillable = [
		'user_id', 'last_activity','status'
	];
}
