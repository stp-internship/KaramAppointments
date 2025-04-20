<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['work', 'personal', 'meeting'];
        $statuses = ['scheduled', 'completed', 'cancelled'];
        
        // Get today's date
        $date = Carbon::today();

        // Create appointments for 7 days
        for ($day = 0; $day < 7; $day++) {
            // Create 10 appointments per day
            for ($i = 0; $i < 10; $i++) {
                Appointment::create([
                    'title' => 'موعد ' . ($i + 1) . ' ليوم ' . $date->format('Y-m-d'),
                    'date' => $date->format('Y-m-d'),
                    'time' => sprintf('%02d:00', rand(9, 17)), // Random time between 9 AM and 5 PM
                    'category' => $categories[array_rand($categories)],
                    'status' => $statuses[array_rand($statuses)],
                    'notes' => 'ملاحظات للموعد رقم ' . ($i + 1) . ' بتاريخ ' . $date->format('Y-m-d'),
                ]);
            }
            
            // Move to next day
            $date->addDay();
        }
    }
}
