<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'notes' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:scheduled,completed,cancelled',
            'category' => 'required|in:work,personal,meeting'
        ];
    }

    public function messages(): array
    {
        return [
            'date.after_or_equal' => 'لا يمكن إضافة موعد في تاريخ سابق',
            'date.required' => 'حقل التاريخ مطلوب',
            'date.date' => 'صيغة التاريخ غير صحيحة'
        ];
    }
}
