<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'matricula' => 'required|size:7|unique:users,matricula',
                'email' => 'required|email',
                'orgao' => 'required',
                'unidade' => 'required',
                'funcao' => 'required',
                'status' => 'required',
                'password' => 'required|min:6', Rules\Password::defaults(),
                //'password_confirmation' => 'required|confirmed'
            ],

            [
                'nome.required' => 'Obrigatório',
                'matricula.required' => 'Obrigatório',
                'matricula.size' => 'O campo Matrícula deve conter 7 dítgitos numéricos',
                'matricula.unique' => 'Este número de Matrícula já existe',
                'email.required' => 'Obrigatório',
                'email.email' => 'O campo Email não foi preenchido corretamente',
                'orgao.required' => 'Obrigatório',
                'unidade.required' => 'Obrigatório',
                'funcao.required' => 'Obrigatório',
                'status.required' => 'Obrigatório',
                'password.required' => 'Obrigatório',
                'password.min' => 'O campo Senha deve conter no mínimo 6 caracteres',
                //'password.max' => 'O campo Senha deve conter no máximo 8 caracteres',
                //'password_confirmation.confirmed' => 'O campo Confirmar Senha deve ser igual ao campo Senha',
                'password_confirmation.required' => 'Obrigatório'
            ]
        );


        $user = User::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'orgao' => $request->orgao,
            'unidade' => $request->unidade,
            'funcao' => $request->funcao,
            'status' => $request->status,
            'password' =>Hash::make($request->password),

        ]);

        if($user){
            $msg = 'Usuário cadastrado com sucesso!';
            return redirect()->route('register', ['msg'=>$msg]);
        }
        else{
            $msg = 'Erro ao tentar cadastrar novo usuário!';
            return redirect()->route('register', ['msg'=>$msg]);
        }

        /*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        */
    }

}
