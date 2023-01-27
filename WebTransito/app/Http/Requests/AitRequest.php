<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AitRequest extends FormRequest
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
            'user_id'=>'required',
            'cod_ait'=>'required|unique:aits,cod_ait',
            'orgao_autuador'=>'required',
            'matricula'=>'required',
            'nome'=>'required',

            'placa' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'pais' => 'required',
            'especie' => 'required',

            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'data' => 'required|date',
            'hora' => 'required',

            'codigo_infracao' => 'required',
            'descricao' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatório',
            'data.date' => 'Formato do compo Data é inválido',
        ];

    }


}
