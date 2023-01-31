<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request);
        if(Auth::user()){

            $user = Auth::user();
            $matricula = $user->matricula;
            $rota = $request->getRequestUri();
            $ip = $request->server->get('REMOTE_ADDR');

            LogAcesso::create([
            'user'=>$user->id,
            'ip'=>$ip,
            'route'=>$rota,
            'msg' => "O usuário $matricula acessou a rota $rota utilizando o IP $ip."
            ]);

            return $next($request);
        }
        else{

            $rota = $request->getRequestUri();
            $ip = $request->server->get('REMOTE_ADDR');

            LogAcesso::create([
                'user'=>'-',
                'ip'=>$ip,
                'route'=>$rota,
                'msg' => "O IP $ip tentou acessar a rota $rota.  Acesso negado."
                ]);
            return back()->with('msg', 'Usuario não está logado no sistema!');
        }

    }
}
