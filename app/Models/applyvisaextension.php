<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applyvisaextension extends Model
{
    use HasFactory;
    protected $table = 'extension_application';
    protected $fillable =[
        'id','student_id','passport_biodata','entry_visa','current_visa','date_of_entry','application_date','application_status'
    ];
}
