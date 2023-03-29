<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocateBuddyModel extends Model
{
    use HasFactory;
    protected $table = "buddies_allocations";

    protected $fillable = [
		'request_id','student_id','buddy_id'
	];
}
