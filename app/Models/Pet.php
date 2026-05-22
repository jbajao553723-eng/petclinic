<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'user_id','name','species','breed','age','notes'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class)->withTimestamps();
    }
}