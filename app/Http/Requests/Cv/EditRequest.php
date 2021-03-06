<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => ['image'],
            'name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'radio-sex' => 'in:male,female',
            'locate_city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'specialization' => ['required'],
            'salary' => ['required'],
            'busyness' => 'required|array|min:1',
            'shedule_types' => 'required|array|min:1',
            'radio-expirience' => 'in:yes,no',
            'about' => ''
        ];
    }
}