<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Appointment::select('name', 'phone', 'casetype', 'casedesc', 'status', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['Name', 'Phone', 'Case Type', 'Description', 'Status', 'Submitted At'];
    }
}

