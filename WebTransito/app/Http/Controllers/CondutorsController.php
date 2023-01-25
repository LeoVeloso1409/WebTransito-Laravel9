<?php

namespace App\Http\Controllers;

use App\Models\Condutors;
use Illuminate\Http\Request;

class CondutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('condutor.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condutor.create');
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
                'nome'=>'required',
                'cpf'=>'required|unique:condutors,cpf',
                'rg'=>'required|unique:condutors,rg',
                'numero_cnh'=>'required|unique:condutors,numero_cnh',
                'categoria'=>'required',
                'validade'=>'required',
                'uf_cnh'=>'required',
                'pais'=>'required',
                'estado'=>'required',
                'cidade'=>'required',
                'bairro'=>'required',
                'logradouro'=>'required',
                'numero'=>'required',

            ],
            [
                'nome.required' => 'O campo Nome tem preenchimento obrigatório',
                'cpf.required' => 'O campo CPF tem preenchimento obrigatório',
                'rg.required' => 'O campo RG tem preenchimento obrigatório',
                'numero_cnh.required' => 'O campo Número CNH tem preenchimento obrigatório',
                'categoria.required' => 'O campo Categoria CNH tem preenchimento obrigatório',
                'validade.required' => 'O campo Validade CNH tem preenchimento obrigatório',
                'uf_cnh.required' => 'O campo UF CNH tem preenchimento obrigatório',
                'pais.required' => 'O campo País tem preenchimento obrigatório',
                'estado.required' => 'O campo Estado tem preenchimento obrigatório',
                'cidade.required' => 'O campo Cidade tem preenchimento obrigatório',
                'bairro.required' => 'O campo Bairro tem preenchimento obrigatório',
                'logradouro.required' => 'O campo Logradouro tem preenchimento obrigatório',
                'numero.required' => 'O campo Número tem preenchimento obrigatório',

            ]
        );

        $condutor = Condutors::create($request->all());

        if($condutor){
            return redirect('webtransito/cadastrar-condutor')->with('sucesso', 'Condutor cadastrado com sucesso!');
        }
        else{
            return redirect('webtransito/cadastrar-condutor')->with('erro', 'Erro ao tentar cadadstrar novo Condutor!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condutors  $condutors
     * @return \Illuminate\Http\Response
     */
    public function show(Condutors $condutors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condutors  $condutors
     * @return \Illuminate\Http\Response
     */
    public function edit(Condutors $condutors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condutors  $condutors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condutors $condutors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condutors  $condutors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condutors $condutors)
    {
        //
    }
}
