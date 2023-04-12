<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

// class Role extends LaratrustRole
class MySchedule extends Model
{
    // public $guarded = [];
    use HasFactory;
    protected $table = "scheduleTime";

    protected $fillable = [
      'user_id', 'my_schedule'
	];
}
