<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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
                'nome' => 'required|max:80|min:10',
                'required' => 'required|unique:clientes,email|max:80',
                'telefone' => 'max:11|min:10',
                'endereco' => 'max:80|min:10'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
      
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Erro de Validação',
            'errors' => $validator->errors()
        ], 422));  
    }
    public function messages()
    {
        return [
        'nome.required' => 'O campo é obrigatório',
        'nome.min' => 'O minimo de caracteres é 3',
        'nome.max' => 'O maximo de caracteres é 100',
        'email.required' => 'O campo é obrigatório',
        'email.min' => 'O minimo de caracteres é 3',
        'email.max' => 'O maximo de caracteres é 100',
        'email.unique' => 'Email cadastrado',
        'telefone.required' => 'O campo é obrigatório',
        'telefone.min'=> 'O minimo de caracteres é 10',
        'telefone.max' => 'O maximo de caracteres é 80',
        'endereco.required' => 'O campo é obrigatório',
        'endereco.min' => 'O minimo de caracteres é 10',
        'endereco.max' => 'O maximo de caracteres é 80'
        ];
    }

}
