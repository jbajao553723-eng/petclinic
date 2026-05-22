<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Appointment;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        /*
        |--------------------------------------------------------------------------
        | BASIC COUNTS
        |--------------------------------------------------------------------------
        */
        $totalUsers = User::count();
        $totalPets = Pet::count();
        $totalServices = Service::count();
        $totalAppointments = Appointment::count();

        /*
        |--------------------------------------------------------------------------
        | APPOINTMENT STATUS (IMPORTANT: make sure you have "status" column)
        |--------------------------------------------------------------------------
        */
        $pendingAppointments = Appointment::where('status', 'Pending')->count();
        $completedAppointments = Appointment::where('status', 'Done')->count();
        $cancelledAppointments = Appointment::where('status', 'Cancelled')->count();

        /*
        |--------------------------------------------------------------------------
        | RECENT APPOINTMENTS
        |--------------------------------------------------------------------------
        */
        $recentAppointments = Appointment::with(['pet', 'service'])
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | MONTHLY CHART DATA
        |--------------------------------------------------------------------------
        */
        $monthlyLabels = collect(range(1, 12))->map(function ($m) {
            return Carbon::create()->month($m)->format('M');
        });

        $monthlyCounts = collect(range(1, 12))->map(function ($m) {
            return Appointment::whereMonth('created_at', $m)->count();
        });

        /*
        |--------------------------------------------------------------------------
        | EARNINGS (ONLY COMPLETED APPOINTMENTS)
        |--------------------------------------------------------------------------
        */
        $earningsThisMonth = Appointment::with('service')
            ->where('status', 'Done')
            ->whereMonth('created_at', $now->month)
            ->get()
            ->sum(function ($appointment) {
                return $appointment->service->price ?? 0;
            });

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPets',
            'totalServices',
            'totalAppointments',
            'pendingAppointments',
            'completedAppointments',
            'cancelledAppointments',
            'recentAppointments',
            'monthlyLabels',
            'monthlyCounts',
            'earningsThisMonth'
        ));
    }
}