
@extends('layout')

@section('content')
    <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex d-none shadow-sm">
        <form class="row g-3" method="POST" action="{{route('veiculo.store')}}">

            @csrf

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
                <legend>Cadastrar Veículo</legend>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="placa" value="{{$veiculo->placa ?? old('placa')}}" class="form-control"
                            placeholder="Placa">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="chassi" value="{{$veiculo->chassi ?? old('chassi')}}" class="form-control"
                            placeholder="Chassi">
                    </div>
                    <div class="col-md-4">
                        <select id="especie" name="especie" class="form-select">
                            <option value="{{$veiculo->especie ?? old('especie')}}">{{$veiculo->especie ?? 'Espécie'}}</option>
                            <option value="PASSAGEIRO">Passageiro</option>
                            <option value="CARGA">Carga</option>
                            <option value="MISTO">Misto</option>
                            <option value="COMPETIÇÃO">Competição</option>
                            <option value="TRAÇÃO">Tração</option>
                            <option value="ESPECIAL">Especial</option>
                            <option value="COLEÇÃO">Coleção</option>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="marca" value="{{$veiculo->marca ?? old('marca')}}" class="form-control"
                            placeholder="Marca">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="modelo" value="{{$veiculo->modelo ?? old('modelo')}}" class="form-control"
                            placeholder="Modelo">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="cor" value="{{$veiculo->cor ?? old('cor')}}" class="form-control"
                            placeholder="Cor">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="pais" value="{{$veiculo->pais ?? old('pais')}}" class="form-control"
                            placeholder="País">
                    </div>

                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Endereço do Veículo</legend>
                <div class="row p-2">

                    <div class="col-md-5">
                        <input type="text" name="proprietario" value="{{$veiculo->proprietario ?? old('proprietario')}}" class="form-control"
                            placeholder="Proprietario">
                    </div>



                    <div class="col-md-3">
                        <select id="estado" name="estado" class="form-select">
                            <option value="{{$veiculo->estado ?? old('uf_cnh')}}">{{$veiculo->estado ?? 'Estado'}}</option>
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                            <option value="BA">BA</option>
                            <option value="...">...</option>
                            <option value="DF">DF</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="cidade" value="{{$veiculo->cidade ?? old('cidade')}}" class="form-control"
                            placeholder="Cidade">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-4">
                        <input type="text" name="bairro" value="{{$veiculo->bairro ?? old('bairro')}}" class="form-control"
                            placeholder="Bairro">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="logradouro" value="{{$veiculo->logradouro ?? old('logradouro')}}" class="form-control"
                            placeholder="Logradouro">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="numero" value="{{$veiculo->numero ?? old('numero')}}" class="form-control"
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
