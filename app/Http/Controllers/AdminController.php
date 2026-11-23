<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\AppointmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf; // for PDF
class AdminController extends Controller
{
    //
    public function getlawyersrequest()
    {
        $law = User::where('lawyer_request','Pending')->get();
        return view('admin.lawyerrequests',compact('law'));
    }
    public function acceptlawyer($id)
    {
        $lawyer = User::find($id);
        $lawyer->lawyer_request = 'Accepted';
        $lawyer->role = 'Lawyer';
        $lawyer->save();
        return redirect()->back()->with('success','Lawyer has been accepted');
    }
    public function rejectlawyer($id)
    {
        $lawyer = User::find($id);
        $lawyer->lawyer_request = 'Denied';
        $lawyer->save();
        return redirect()->back()->with('error','Lawyer has been rejected');
    }
    public function getapprovedlawyers()
    {
         $law = User::where('lawyer_request','Accepted')->get();
        return view('admin.approvedlawyers',compact('law'));
    }

    public function storeAppointment(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'casetype' => 'required',
        'casedesc' => 'required',
    ]);

    Appointment::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'casetype' => $request->casetype,
        'casedesc' => $request->casedesc,
    ]);

    return redirect()->back()->with('success', 'Request submitted!');
}


public function index()
{
    $appointments = Appointment::all();
    return view('admin.clients', compact('appointments'));
}

public function accept($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'accepted';
    $appointment->save();
    return back();
}

public function delete($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'deleted';
    $appointment->save();
    return back();
}


public function exportExcel()
{
    return Excel::download(new AppointmentsExport, 'appointments.xlsx');
}

public function exportPDF()
{
    $appointments = Appointment::all();
    $pdf = Pdf::loadView('admin.clients-pdf', compact('appointments'));
    return $pdf->download('appointments.pdf');
}


}
