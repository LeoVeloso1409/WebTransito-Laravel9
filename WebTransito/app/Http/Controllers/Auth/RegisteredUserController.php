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
use App\Http\Requests\UserRequest;

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
    public function store(UserRequest $request)
    {
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

    public function edit($id){

        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, $id){
        //dd($request->id);

        $user = User::find($id);

        $update = $user->update($request->all());

        if($update){
            $msg = 'Registro atualizado com sucesso!';
            return redirect()->route('user.edit', ['id'=> $user->id, 'msg'=>$msg]);
        }
        else{
            $msg = 'Erro ao tentar atualizar registro!';
            return redirect()->route('user.edit', ['id'=> $user->id, 'msg'=>$msg]);
        }

    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('users');

    }

}
