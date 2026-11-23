<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\caserequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ✅ Lawyer registration request handler
    public function sendlawyerrequest(Request $req, $id)
    {
        $req->validate([
            'lawyerphone' => 'required|string',
            'lawyercnic' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'lawyercertificate' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'lawyercategory' => 'required|string',
        ]);

        // Store CNIC
        $cnic = $req->file('lawyercnic');
        $cnicname = time() . '_' . $cnic->getClientOriginalName();
        $cnic->move(public_path('lawyers/cnic'), $cnicname);

        // Store Certificate
        $certificate = $req->file('lawyercertificate');
        $certificatename = time() . '_' . $certificate->getClientOriginalName();
        $certificate->move(public_path('lawyers/certificates'), $certificatename);

        
        // Store Lawyer Image (optional, if you want to handle it)
        $image = $req->file('lawyer_image');
        $imagename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('lawyers/images'), $imagename);

        // Update user with lawyer data
        $user = User::findOrFail($id);
        $user->lawyer_phone = $req->lawyerphone;
        $user->lawyer_cnic = $cnicname;
        $user->lawyer_category = $req->lawyercategory;
        $user->lawyer_certficate = $certificatename;
        $user->lawyer_request = 'Pending';
        $user->lawyer_image = $imagename; // Optional, if you handle lawyer images
        $user->save();

        return redirect()->back()->with('success', 'Lawyer request sent successfully!');
    }

    // ✅ Consultation form submission
    public function getappointmentfromlawyer(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'casetype' => 'required|string',
            'casedesc' => 'required|string',
        ]);

        $case = new caserequest();
        $case->user_id = Auth::id();
        $case->requested_for = $req->casetype;
        $case->casedesc = $req->casedesc;
        $case->save();

        return redirect()->back()->with('success', 'Your request has been sent to admin. Wait for our reply.');
    }

    // ✅ Show matching requests to logged-in lawyer
    public function showRequestsForLawyer()
    {
        $user = Auth::user();

        if (!$user || $user->lawyer_category == null) {
            return redirect()->back()->with('error', 'You must be a registered lawyer to view requests.');
        }

        // Show only requests that match the lawyer's category
        $requests = caserequest::where('requested_for', $user->lawyer_category)
            ->latest()
            ->get();

        return view('request', compact('requests'));
    }





public function acceptRequest($id)
{
    $request = caserequest::findOrFail($id);
    $user = User::find($request->user_id);

    // Send email to client
    Mail::raw("Hello {$user->name}, your case request has been accepted by a lawyer.", function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Case Request Accepted');
    });

    // Optional: update status
    $request->status = 'accepted';
    $request->save();

    return redirect()->back()->with('success', 'Request accepted and email sent.');
}

public function deleteRequest($id)
{
    $request = caserequest::findOrFail($id);
    $request->delete();

    return redirect()->back()->with('success', 'Request deleted successfully.');
}



}
