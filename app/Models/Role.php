<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

// class Role extends LaratrustRole
class Role extends Model
{
    // public $guarded = [];
    use HasFactory;
    protected $table = "user_roles";

    protected $fillable = [
      'user_id', 'role'
	];
}
