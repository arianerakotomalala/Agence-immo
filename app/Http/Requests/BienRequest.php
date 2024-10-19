<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienRequest extends FormRequest
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
        'titre' => ['required', 'string', 'min:3'],     
        'surface' => ['required', 'string', 'min:3'],    
        'prix' => ['required', 'numeric', 'min:100'],             
        'description' => ['required', 'string', 'min:10'],
        'adresse' => ['required', 'string'],              
        'code_postal' => ['required', 'integer'], 
        'chambre' => ['required', 'string'],              
        'etage' => ['required', 'string'],       
        'piece' => ['required', 'string'],       
        'est_vendu' => ['nullable', 'boolean'],    
        'ville'=>['required','string'] 
    ];
}

}
