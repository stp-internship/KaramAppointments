<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index(Request $request)
    {
        $appointments = $this->appointmentService->getFilteredAppointments($request);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(AppointmentRequest $request)
    {
        $this->appointmentService->createAppointment($request);
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $this->appointmentService->updateAppointment($request, $appointment);
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    public function destroy(Appointment $appointment)
    {    
        $this->appointmentService->deleteAppointment($appointment);
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully');
    }
}
