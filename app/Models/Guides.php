<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    use HasFactory;
    protected $table = "guide_files";

    protected $fillable = [
		'file_name','file'
	];
}
