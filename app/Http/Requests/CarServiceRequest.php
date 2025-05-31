<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarServiceRequest extends FormRequest
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
            'book_service_id' => ['required'],
//            'oil' => ['required'],
//            'oil_name' => ['required'],
            'oil_filter' => ['required'],
            'air_filter' => ['required'],
            'inner_filter' => ['required'],
            'fuel_filter' => ['required'],
            'brake_pads_front' => ['required'],
            'disc_front' => ['required'],
            'brake_pads_rear' => ['required'],
            'disc_rear' => ['required'],
            'front_left_cylinder' => ['required'],
            'front_right_cylinder' => ['required'],
            'rear_left_cylinder' => ['required'],
            'rear_right_cylinder' => ['required'],
            'belt' => ['required'],
            'water_pump' => ['required'],
            'alt_pulley' => ['required'],
            'spanner' => ['required'],
            'roll' => ['required'],
            'outside_belt' => ['required'],
            'outside_spanner' => ['required'],
//            'description' => ['required'],
            'kilometers' => ['required'],
            'price'      => ['required'],
        ];
    }
}
