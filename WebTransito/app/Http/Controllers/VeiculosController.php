<?php

namespace App\Http\Controllers;

use App\Models\Veiculos;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate(
            [
                'placa'=>'required|unique:veiculos,placa',
                'chassi'=>'required|unique:veiculos,chassi',
                'marca'=>'required',
                'modelo'=>'required',
                'cor'=>'required',
                'especie'=>'required',
                'pais'=>'required',
                'estado'=>'required',
                'cidade'=>'required',
                'bairro'=>'required',
                'logradouro'=>'required',
                'numero'=>'required',
                'proprietario'=>'required'
            ]
        );

        $veiculo = Veiculos::create($request->all());

        if($veiculo){
            return redirect('webtransito/cadastrar-condutor')->with('sucesso', 'Condutor cadastrado com sucesso!');
        }
        else{
            return redirect('webtransito/cadastrar-condutor')->with('erro', 'Erro ao tentar cadadstrar novo Condutor!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veiculos  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculos $veiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veiculos  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculos $veiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veiculos  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculos $veiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veiculos  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculos $veiculos)
    {
        //
    }
}
