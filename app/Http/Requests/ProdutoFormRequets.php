<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoFormRequets extends FormRequest
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
            'nome' => 'required|min:3|max:100',
            'codigo' => 'required|unique:produtos,codigo|min:3|max:10',
            'preco' => 'required|decimal:2',
            'quantidade_estoque'=> 'required|min:2|max:255'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Erro de Validação',
            'errros' => $validator->errors()
        ], 422)); 
    }
    public function messages()
    {
        return [
        'nome.required' => 'O campo é obrigatório',
        'nome.min' => 'O minimo de caracteres é 3',
        'nome.max' => 'O maximo de caracteres é 100',
        'codigo.required' => 'O campo é obrigatório',
        'codigo.min' => 'O minimo de caracteres é 3',
        'codigo.max' => 'O maximo de caracteres é 10',
        'codigo.unique' => 'Código cadastrado',
        'preco.required' => 'O campo é obrigatório',
        'preco.decimal' => 'O campo deve ser composto pelo valor',
       
        ];
    }
}
