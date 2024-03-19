<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotebookRequest extends FormRequest
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
    public function rules()
    {
        return [
            'full_name' => 'required|string|min:5|max:100',
            'company' => 'required|string|min:3|max:50',
            'phone' => 'required|min:5|max:100',
            'email' => 'required|email',
            'birthdate' => 'nullable|date',
            'photo' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            "required" => "поле :attribute обязательно к заполнению",
            "string" => "Ожидается текстовое значение",

            "full_name.min" => "Максимальное колличество символов 5",
            "full_name.max" => "Максимальное колличество символов 100",

            "company.min" => "Максимальное колличество символов 3",
            "company.max" => "Максимальное колличество символов 50",

            "phone.min" => "Максимальное колличество символов 5",
            "phone.max" => "Максимальное колличество символов 100",
        ];
    }
}
