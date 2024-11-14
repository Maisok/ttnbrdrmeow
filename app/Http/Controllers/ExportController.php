<?php

namespace App\Http\Controllers;

use App\Exports\ActiveAppointmentsExport;
use App\Exports\CompletedAppointmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportActiveAppointments()
    {
        return Excel::download(new ActiveAppointmentsExport, 'active_appointments.xlsx');
    }

    public function exportCompletedAppointments()
    {
        return Excel::download(new CompletedAppointmentsExport, 'completed_appointments.xlsx');
    }
}