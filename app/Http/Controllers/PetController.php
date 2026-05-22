<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN: VIEW ALL PETS
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $pets = Pet::with('owner')
            ->latest()
            ->get();

        return view('admin.pets.index', compact('pets'));
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW SINGLE PET (MEDICAL PROFILE)
    |--------------------------------------------------------------------------
    */
    public function show(Pet $pet)
    {
        $pet->load([
            'owner',
            'medicalRecords',
            'appointments.service'
        ]);

        return view('admin.pets.show', compact('pet'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PET (CLIENT OR ADMIN)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
        ]);

        Pet::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Pet added successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PET (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return back()->with('success', 'Pet deleted');
    }
}