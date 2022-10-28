<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_id' => ['required'],
            'land_usage_id' => ['required', 'integer'],
            'cadastral_nr' => ['required'],
            'area' => ['required', 'numeric'],
            'border_measurement_date' => ['required', 'date'],
        ];
    }
}
