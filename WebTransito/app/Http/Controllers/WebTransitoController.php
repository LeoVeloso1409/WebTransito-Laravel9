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
        return view('user.pesquisar');
    }

    public static function aits(){
        return view('ait.pesquisar');
    }

    public static function buscarUsuarios(Request $request){

    }

    public static function buscaCod_Ait(Request $request){

    }

    public static function buscaAvancadaAit(Request $request){

    }
}
