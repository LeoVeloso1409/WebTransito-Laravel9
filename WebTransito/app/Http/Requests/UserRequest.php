<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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
            'nome' => 'required',
            'matricula' => 'required|size:7|numeric|unique:users,matricula',
            'email' => 'required|email',
            'orgao' => 'required',
            'unidade' => 'required',
            'funcao' => 'required',
            'status' => 'required',
            'password' => 'required|min:6', Rules\Password::defaults(),
            //'password_confirmation' => 'required|confirmed'
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatório',
            'matricula.size' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
            'matricula.unique' => 'Este número de Matrícula já existe',
            'email.email' => 'O campo Email não foi preenchido corretamente',

            //'password.max' => 'O campo Senha deve conter no máximo 8 caracteres',
            //'password_confirmation.confirmed' => 'O campo Confirmar Senha deve ser igual ao campo Senha',

        ];

    }
}
