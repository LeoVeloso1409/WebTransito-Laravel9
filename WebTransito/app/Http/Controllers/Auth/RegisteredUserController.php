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
            'nome' => strtoupper($request->nome),
            'matricula' =>strtoupper($request->matricula),
            'email' => strtoupper($request->email),
            'orgao' => $request->orgao,
            'unidade' => $request->unidade,
            'funcao' => $request->funcao,
            'status' => $request->status,
            'password' =>Hash::make($request->password),

        ]);

        if($user){
            return back()->with('msg', 'Usuário cadastrado com sucesso!');
        }
        else{
            return back()->with('msg', 'Falha ao cadastrado novo Usuário!');
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

    public function update(Request $request, $id){
        //dd($request);

        $user = User::find($id);

        $update = $user->update($request->all());
        if($update){
            return back()->with('msg', 'Usuário atualizado com sucesso!');
        }
        else{
            return back()->with('msg', 'Falha ao tentar autualizar Usuário!');
        }

    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        return back()->with('msg', 'Usuário excluído com sucesso!');;

    }

}
