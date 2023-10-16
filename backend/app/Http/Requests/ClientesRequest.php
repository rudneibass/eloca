<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClientesRequest extends FormRequest
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
            'razao_social' => 'required',
            'tipo' => 'required',
            'cpf_cnpj' => 'required|unique:clientes',
            'empresa' => 'required',
        ];
    }

    public function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(response()->json([
             $validator->errors()
        ], 400));

    }

    public function messages()
    {
        return [
            'razao_social.required' => 'O campo Razão Social é obrigatório.',
            'tipo.required' => 'O campo Tipo é obrigatório.',
            'cpf_cnpj.required' => 'O campo CPF_CNPJ é obrigatório.',
            'cpf_cnpj.unique' => 'CPF_CNPJ já cadastrado e não permite repetição.',
            'empresa.required' => 'O campo Empresa é obrigatório.',
        ];
    }
}
