<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => ['required'],
            'transmission_id'  => ['required'],
            'fuel_id' => ['required'],
            'chassis_number' => ['required'],
            'engine_number' => ['required'],
            'year'  => ['required'],
            'plate_number' => ['required'],
            'volume' => ['required'],
            'power' => ['required'],
        ];
    }
}
