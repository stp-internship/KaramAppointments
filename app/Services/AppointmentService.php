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

    public function createAppointment(Request $request)
    {
        $messages = [
            'date.after_or_equal' => 'لا يمكن إضافة موعد في تاريخ سابق',
            'date.required' => 'حقل التاريخ مطلوب',
            'date.date' => 'صيغة التاريخ غير صحيحة'
        ];
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'notes' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:scheduled,completed,cancelled',
            'category' => 'required|in:work,personal,meeting'
        ], $messages);

        return Appointment::create($validated);
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'title' =>'required|string|max:255',
            'notes' =>'required|string',
            'date' =>'required|date',
            'time' =>'required|date_format:H:i',
            'status' =>'required|in:scheduled,completed,cancelled',
            'category' =>'required|in:work,personal,meeting'
        ]);

        return $appointment->update($validated);
    }

    public function deleteAppointment(Appointment $appointment)
    {
        return $appointment->delete();
    }
}

