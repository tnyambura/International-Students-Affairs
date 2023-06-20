<?php

namespace App\Exports;

use App\Models\AllUsersDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithTitle, WithHeadings
{
    // use Exportable;

    public function collection()
    {
        // return AllUsersDetails::where('is_admin', true)->get();
        return AllUsersDetails::all();
    }

    public function title(): string
    {
        return 'List of International Students';
    }
    public function headings(): array
    {
        return ["SU ID", "Surname", "Other Names", "Email", "Phone", "Faculty", "Course", "Nationality", "Passport Number", "Passport Expiry Date", "Residence"];
    }
}
