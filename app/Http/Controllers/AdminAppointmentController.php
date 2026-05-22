<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['user', 'pet', 'service'])
            ->latest()
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,completed,cancelled'
        ]);

        $appointment->update([
            'status' => $request->status
        ]);

        return back();
    }
}