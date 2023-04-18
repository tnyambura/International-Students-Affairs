<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laratrust\Models\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

// class Role extends LaratrustRole
class BookingList extends Model
{
    // public $guarded = [];
    use HasFactory;
    protected $table = "bookingList";

    protected $fillable = [
      'student_id', 'booked_date_time', 'status','requested_at'
	];
}