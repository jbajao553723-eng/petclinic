<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
public function index()
{
    $user = auth()->user();

    $pets = $user->pets()->get();

    $appointments = $user->appointments()->with('pets')->latest()->get();

    return view('client.dashboard', [
        'pets' => $pets,
        'appointments' => $appointments,
        'totalAppointments' => $appointments->count(),
        'pendingAppointments' => $appointments->where('status', 'Pending')->count(),
    ]);
}
}
