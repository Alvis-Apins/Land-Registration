<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'state_id' => ['required'],
            'type' => ['integer'],
            'name' => ['string', 'required'],
            'phone' => ['required','string'],
            'email' => ['required', 'email'],
            'address' => ['required','string']
        ];
    }
}
