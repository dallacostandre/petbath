<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroClienteRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         'cliente_whatsapp' => 'required',
    //         'cliente_telefone' => 'required',
    //         'cliente_nome' => 'required',
    //         'cliente_email' => 'required',
    //         'cliente_cep' => 'required',
    //         'cliente_rua' => 'required',
    //         'cliente_numero' => 'required',
    //         'cliente_complemento' => 'required',
    //         'cliente_cidade' => 'required',
    //         'cliente_bairro' => 'required',
    //         'cliente_estado' => 'required',
    //         'pet_nome' => 'required',
    //         'pet_especie' => 'required',
    //         'pet_porte' => 'required',
    //         'pet_raca' => 'required',
    //         'pet_genero' => 'required',
    //         'pet_pelagem' => 'required',
            
    //     ];
    // }

    // public function messages()
    // {
	// 	return [
	// 		'required' => 'Este campo é obrigatório!'
	// 	];
    // }
}
