<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $this->redirect = route('portfolio.contact') . '#rdv';

        return [
            'full_name_rdv' => ['required', 'min:3', 'max:255', 'string'],
            'email_rdv' => ['required', 'email'],
            'site_type_rdv' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
        ];
    }
}
