<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    use HasFactory;
    protected $table = "guide_files";
    public $timestamps = false;

    protected $fillable = [
		'id','file_name'
	];
}
