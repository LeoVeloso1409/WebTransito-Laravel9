<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ait;
use App\Models\User;
use App\Models\Veiculos;
use App\Models\Condutors;

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

                //dd($users);

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
                return back()->with('msg', 'Pesquisa não retornou nenhum Registro!');
           }

        }

        else{
            return back()->with('msg', 'Preencha pelo menos um dos campos.');

        }

        //dd($users);

        //return view('users', compact('users'));

    }

    public static function buscaCod_Ait(Request $request){

    }

    public static function buscaAvancadaAit(Request $request){

    }

    public static function buscarVeiculo(Request $request){
        //dd($request);
        $ait = Ait::find($request->ait_id);

        if(!empty($request->placa)||!empty($request->chassi)){

            $veiculo = Veiculos::Where('placa', $request->placa)->orWhere('chassi', $request->chassi)->first();

            return back()->with($veiculo);
        }
        else{
            $request->session()->flash('erro', 'Pesquisa nao retornou nenhum registro!');
            return view('ait.edit', compact('ait'))->with($request);
        }
    }

    public static function buscarCondutor(Request $request){
        //dd($request);
        $ait = Ait::find($request->ait_id);

        if(!empty($request->cpf)||!empty($request->numero_cnh)){

            $condutor = Condutors::Where('cpf', $request->cpf)->orWhere('numero_cnh', $request->numero_cnh)->first();

            return back()->with($condutor);
        }
        else{
            $erro = "Pesquisa não retornou nenhum resultado. ";
            return view('ait.edit', compact('ait'))->with($erro);
        }
    }
}
