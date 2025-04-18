<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
             'name' => 'required|string|min:5|unique:courses,name',

         ]; 
     }
     public function messages(): array
    {
        return[
            'name.required' => 'Campo nome é obrigatório!',
            'name.unique' => 'O curso já está cadastrado!',
            'name.min' => 'O curso deve ter no mínimo :min caracteres!',
        ];
    }
}
