
@extends('layout')

@section('content')
    <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex d-none shadow-sm">
        <form class="row g-3" method="POST" action="{{route('condutor.store')}}">

            @csrf

            @if(session('successo'))
                <div class="alert alert-success">
                    <p>{{session('successo')}}</p>
                </div>
                @if (session('erro'))
                    <div class="alert alert-alert">
                        <p>{{session('erro')}}</p>
                    </div>
                @endif
            @endif
             @if ($errors->any())
                <div style="background-color:rgb(249, 250, 192)">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <fieldset class="shadow-sm p-4">
                <legend>Cadastrar Condutor</legend>
                <div class="row p-2">
                    <div class="col-md-6">
                        <input type="text" name="nome" value="{{$condutor->nome ?? old('nome')}}" class="form-control"
                            placeholder="Nome">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="cpf" value="{{$condutor->cpf ?? old('cpf')}}" class="form-control"
                            placeholder="CPF">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="rg" value="{{$condutor->rg ?? old('rg')}}" class="form-control"
                            placeholder="RG">
                    </div>

                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="numero_cnh" value="{{$condutor->numero_cnh ?? old('cnumero_cnh')}}" class="form-control"
                            placeholder="Número CNH">
                    </div>

                    <div class="col-md-2">
                        <select id="uf_cnh" name="uf_cnh" class="form-select">
                            <option value="{{$condutor->uf_cnh ?? old('uf_cnh')}}">{{$condutor->uf_cnh ?? 'UF CNH'}}</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                            <option value="BA">BA</option>
                            <option value="...">...</option>
                            <option value="DF">DF</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="categoria" name="categoria" class="form-select">
                            <option value="{{$condutor->categoria ?? old('categoria')}}">{{$condutor->categoria ?? 'Categoria'}}</option>
                            <option value="A">A</option>
                            <option value="AB">AB</option>
                            <option value="ACC">ACC</option>
                            <option value="AC">AC</option>
                            <option value="AD">AD</option>
                            <option value="AE">AE</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="PPD">PPD</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input placeholder="Validade CNH" name='validade' value="{{$condutor->validade ?? old('validade')}}" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Endereço do Condutor</legend>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="pais" value="{{$condutor->pais ?? old('pais')}}" class="form-control"
                            placeholder="País">
                    </div>
                    <div class="col-md-3">
                        <select id="estado" name="estado" class="form-select">
                            <option value="{{$condutor->estado ?? old('estado')}}">{{$condutor->estado ?? 'Estado'}}</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                            <option value="BA">BA</option>
                            <option value="...">...</option>
                            <option value="DF">DF</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cidade" value="{{$condutor->cidade ?? old('cidade')}}" class="form-control"
                            placeholder="Cidade">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <input type="text" name="bairro" value="{{$condutor->bairro ?? old('bairro')}}" class="form-control"
                            placeholder="Bairro">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="logradouro" value="{{$condutor->logradouro ?? old('logradouro')}}" class="form-control"
                            placeholder="Logradouro">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="numero" value="{{$condutor->numero ?? old('numero')}}" class="form-control"
                            placeholder="Numero">
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
