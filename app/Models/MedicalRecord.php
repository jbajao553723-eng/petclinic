<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = [
        'pet_id','diagnosis','treatment','notes','veterinarian'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}