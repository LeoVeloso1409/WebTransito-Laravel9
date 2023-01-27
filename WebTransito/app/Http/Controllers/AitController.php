<?php

namespace App\Http\Controllers;

use App\Models\Ait;
use Illuminate\Http\Request;
use App\Http\Requests\AitRequest;

class AitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aits = Ait::where('status', false)->paginate(10);
        $data = '';

        //dd($aits);

        return view('ait.index', ['aits'=>$aits, 'data'=>$data]);
    }

    public function meusRegistros()
    {
        $aitsTrue = Ait::where('status', true)->paginate(10);
        $data = '';

        return view('ait.index', ['aitsTrue'=>$aitsTrue, 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AitRequest $request)
    {
        $ait = Ait::create([
            'user_id'=>$request->user_id,
            'cod_ait'=>$request->cod_ait,
            'orgao_autuador'=>$request->orgao_autuador,
            'matricula'=>$request->matricula,
            'nome'=>$request->nome,
            'status'=> 0,
        ]);

        if($ait){
            return redirect()->route('home');
        }
        else{
            $msg = 'Erro ao tentar criar novo AIT!';

            return route('ait.index',['msg'=>$msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function show(Ait $ait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ait = Ait::find($id);

        //dd($ait);

        return view('ait.edit', ['ait'=>$ait]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function update(AitRequest $request, $id)
    {
        $update = Ait::where(['id'=>$id])->update([
            'placa'=>$request->placa,
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'cor'=>$request->cor,
            'chassi'=>$request->chassi,
            'pais'=>$request->pais,
            'especie'=>$request->especie,

            'nome_condutor'=>$request->nome_condutor,
            'cpf_condutor'=>$request->cpf_condutor,
            'rg_condutor'=>$request->rg_condutor,
            'cnh_condutor'=>$request->cnh_condutor,
            'uf_cnh'=>$request->uf_cnh,
            'categoria_cnh'=>$request->categoria_cnh,
            'validade_cnh'=>$request->validade_cnh,

            'logradouro'=>$request->logradouro,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,
            'data'=>$request->data,
            'hora'=>$request->hora,

            'codigo_infracao'=>$request->codigo_infracao,
            'descricao'=>$request->descricao,
            'medicao_realizada'=>$request->medicao_realizada,
            'limite_regulamentado'=>$request->limite_regulamentado,
            'valor_considerado'=>$request->valor_considerado,
            'observacoes'=>$request->observacoes,

            'medida1'=>$request->medida1,
            'medida2'=>$request->medida2,
            'ficha_vistoria'=>$request->ficha_vistoria,

            'imagem'=>$request->imagem,

            'status'=> 1,
            'situacao'=> 'VALIDA'
        ]);

        if($update){
            //$msg = 'Registro atualizado com sucesso!';
            return redirect()->route('home');
        }
        else{
            //$msg = 'Erro ao tentar atualizar registro!';
            return redirect();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ait  $ait
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ait $ait)
    {
        //
    }
}
