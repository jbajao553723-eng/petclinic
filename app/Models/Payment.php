<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'appointment_id',
        'amount',
        'method',
        'status',
        'proof_of_payment',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function getProofUrlAttribute()
    {
        return $this->proof_of_payment ? Storage::url($this->proof_of_payment) : null;
    }
}
