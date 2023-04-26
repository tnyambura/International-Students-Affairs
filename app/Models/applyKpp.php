<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applyKpp extends Model
{
    use HasFactory;
    protected $table = 'kpps_application';
    protected $fillable =[
        'id','student_id','date_entry','passport_picture','passport_biodata','current_visa','guardian_biodata','commitment_letter',
        'accademic_transcript','police_clearance','application_date','application_status'
    ];
}
