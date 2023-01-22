<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ait;
use App\Models\User;

class WebTransitoController extends Controller
{
    public static function gerarCodAit(){

        $orgao = Auth::user()->orgao;

        if($orgao === 'PMMG'){
            $cod_ait = 'PM-'.date('Y').'-'.idate('U');
            return $cod_ait;
        }
        if($orgao === 'PCMG'){
            $cod_ait = 'PC-'.date('Y').'-'.idate('U');
            return $cod_ait;
        }
    }

    public static function Usuarios(){
        $users = '';
        return view('user.pesquisar', compact('users'));
    }

    public static function aits(){
        return view('ait.pesquisar');
    }

    public static function buscarUsuarios(Request $request){

        //dd($request);
        if(!empty($request->matricula)||!empty($request->nome)||!empty($request->orgao)||($request->status==false)||($request->status==true)){
           if(!empty($request->matricula)){
                $users = User::where('matricula', $request->matricula)->paginate();

                return view('user.pesquisar', compact('users'));
           }
           if((!empty($request->nome))){
                $users = User::where('nome', 'like', $request->nome)->paginate();

                return view('user.pesquisar', compact('users'));
           }

           if((!empty($request->orgao)&&(($request->status==false)||($request->status==true)))){
                $users = User::Where('orgao', $request->orgao)->Where('status', $request->status)->paginate();

                return view('user.pesquisar', compact('users'));
           }

           if((!empty($request->orgao)||(($request->status==false)||($request->status==true)))){
                $users = User::Where('orgao', $request->orgao)->orWhere('status', $request->status)->paginate();

                return view('user.pesquisar', compact('users'));
           }

           if(empty($users)){
                return redirect('webtransito/pesquisar-usuarios')->with('msg', 'Pesquisa nao retornou nenhum resultado.');
           }

        }

        else{
            return redirect('webtransito/pesquisar-usuarios')->with('msg', 'Preencha pelo menos um dos campos.');

        }

        //dd($users);

        //return view('users', compact('users'));

    }

    public static function buscaCod_Ait(Request $request){

    }

    public static function buscaAvancadaAit(Request $request){

    }
}
