<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;


class DoctorController extends Controller
{
    public function dashboard()
{
    return view('doctor.dashboard');
}

    public function appointments()
    {
        $appointments = Appointment::where('doctor_id', auth()->id())
                                   ->where('status', 'pending')
                                   ->get();
    
        return view('appointments.index', compact('appointments'));
    }
    public function acceptAppointment($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'accepted';
    $appointment->save();

    return back()->with('success', 'Rendez-vous accepté');
}

public function rejectAppointment($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'rejected';
    $appointment->save();

    return back()->with('success', 'Rendez-vous refusé');
}

}