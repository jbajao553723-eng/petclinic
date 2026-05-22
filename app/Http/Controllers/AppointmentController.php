<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CLIENT: VIEW OWN APPOINTMENTS
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())
            ->with(['pets', 'service'])
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT: CREATE FORM
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('appointments.create', [
            'pets' => Pet::where('user_id', auth()->id())->get(),
            'services' => Service::where('is_available', 1)->get()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CLIENT: STORE APPOINTMENT
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'pet_ids' => ['required', 'array', 'min:1'],
            'pet_ids.*' => [
                'required',
                Rule::exists('pets', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->id());
                }),
            ],
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
        ]);

        $petIds = array_values(array_unique($request->input('pet_ids', [])));
        $firstPetId = $petIds[0];

        $appointment = Appointment::create([
            'user_id' => auth()->id(),
            'pet_id' => $firstPetId,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'Pending Payment',
        ]);

        $appointment->pets()->attach($petIds);

        $service = Service::find($request->service_id);
        $amount = $service->price * count($petIds);

        Payment::create([
            'user_id' => auth()->id(),
            'appointment_id' => $appointment->id,
            'amount' => $amount,
            'method' => 'GCash',
            'status' => 'Pending',
        ]);

        return redirect()->route('payments.show', $appointment->id);
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: VIEW ALL APPOINTMENTS
    |--------------------------------------------------------------------------
    */
    public function adminIndex()
    {
        $appointments = Appointment::with(['pets', 'service', 'user', 'payment'])
            ->latest()
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: UPDATE STATUS (APPROVE / REJECT / DONE)
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected,Done'
        ]);

        $appointment->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Appointment updated.');
    }
}