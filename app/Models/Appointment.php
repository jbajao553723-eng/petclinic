<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'service_id',
        'appointment_date',
        'status',
        'notes'
    ];

    protected $casts = [
        'appointment_date' => 'date',
    ];

    // 👤 CLIENT
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🐶 PRIMARY PET
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // 🐶 ALL SELECTED PETS
    public function pets()
    {
        return $this->belongsToMany(Pet::class)->withTimestamps();
    }

    // 💳 PAYMENT PROOF
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getPetNamesAttribute()
    {
        return $this->pets->pluck('name')->whenEmpty(function () {
            return $this->pet ? collect([$this->pet])->pluck('name') : collect();
        })->join(', ');
    }

    // 🩺 SERVICE
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}