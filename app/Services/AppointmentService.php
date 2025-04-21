<?php
namespace App\Services;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentService
{
    public function getFilteredAppointments(Request $request)
    {
        $query = Appointment::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('time_filter')) {
            if ($request->time_filter === 'upcoming') {
                $query->whereDate('date', '>=', now()->format('Y-m-d'));
            } elseif ($request->time_filter === 'past') {
                $query->whereDate('date', '<', now()->format('Y-m-d'));
            }
        }

        return $query->orderBy('date', 'asc')
                    ->orderBy('time', 'asc')
                    ->paginate(10); // Add pagination with 10 items per page
    }

    public function createAppointment($request)
    {
        return Appointment::create($request->validated());
    }

    public function updateAppointment($request, Appointment $appointment)
    {
        return $appointment->update($request->validated());
    }

    public function deleteAppointment(Appointment $appointment)
    {
        return $appointment->delete();
    }
}

