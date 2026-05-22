<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer|min:1',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_available' => true,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer|min:1',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }

   public function toggle($id)
{
    $service = Service::findOrFail($id);

    $service->is_available = !$service->is_available;

    $service->save();

    return back()->with('success', 'Service availability updated');
}
}