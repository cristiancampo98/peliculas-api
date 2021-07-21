<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
        return [
            'caratula' => 'required|image',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'required|numeric',
            'release_date' => 'required|date',
            'categories' => 'required',
            'trailer' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'release_date.required' => 'La fecha de estreno es requerida',
        ];
    }
}
