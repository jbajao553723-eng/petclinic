<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function show($appointmentId)
    {
        $payment = Payment::where('appointment_id', $appointmentId)->first();

        return view('payments.show', compact('payment'));
    }

    public function adminIndex()
    {
        $payments = Payment::with(['appointment.user', 'appointment.service'])
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function pay(Request $request, Payment $payment)
    {
        $request->validate([
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $path = $request->file('proof_of_payment')->store('payments/proofs', 'public');

        $payment->update([
            'proof_of_payment' => $path,
            'status' => 'Pending',
        ]);

        $payment->appointment->update([
            'status' => 'Pending',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Payment proof uploaded. Appointment is pending approval.');
    }
}
