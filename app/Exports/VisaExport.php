<?php

namespace App\Exports;

use App\Models\AllUsersDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class VisaExport implements FromCollection, WithTitle, WithHeadings
{

    public function collection()
    {
        $data=[];
        $fetchedKpp = DB::table('kpps_application')->get();
        $fetchedExt = DB::table('extension_application')->get();
        foreach ($fetchedKpp as $v) {
            $user = DB::table('student_view_data')->where('student_id',$v->student_id)->limit(1)->get()[0];
            array_push($data,['type'=>'Kpp','id'=>$user->student_id,'name'=>$user->surname.' '.$user->other_names,'email'=>$user->email,'nationality'=>$user->nationality,'passport'=>$user->passport_number,'entry'=>$v->date_of_entry,'status'=>$v->application_status,'expiry'=>$v->expiry_date]);
        }
        foreach ($fetchedExt as $v) {
            $user = DB::table('student_view_data')->where('student_id',$v->student_id)->limit(1)->get()[0];
            array_push($data,['type'=>'Ext','id'=>$user->student_id,'name'=>$user->surname.' '.$user->other_names,'email'=>$user->email,'nationality'=>$user->nationality,'passport'=>$user->passport_number,'entry'=>$v->date_of_entry,'status'=>$v->application_status,'expiry'=>$v->expiry_date]);
        }
        return collect($data);
    }

    public function title(): string
    {
        return 'List of Visa Applications';
    }
    public function headings(): array
    {
        return ["Visa","SU ID", "Full Name", "Email", "Nationality", "Passport Number", "Date of Entry", "Status","Expiry Date"];
    }
}
