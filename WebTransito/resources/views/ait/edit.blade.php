@extends('layout')

@section('content')
    <div class="row justify-content-around p-4 w-100">
        <div class="col-md-5   ">
            <div class="input-group">
                <span class="btn btn-secondary">Código AIT</span>
                <input disabled type="text" class="form-control" placeholder="{{$ait->cod_ait}}">

            </div>
        </div>
    </div>
    <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex d-none shadow-sm" id="formAit">

        <form class="row g-3" method="POST" action="{{route('ait.update', $ait->id)}}">

            @csrf
            @method('PATCH')

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h6 style="color:cadetblue">* Campos com preenchimento obrigatório!</h6>
                </div>
            </div>
            <fieldset class="shadow-sm p-4">

                <input hidden name="id" value="{{$ait->id}}">

                <legend>Identificação do Veículo</legend>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="placa" value="{{$veiculo->placa ?? old('placa')}}"
                            class="form-control @error('placa') is-invalid @enderror" placeholder="Placa *">
                            @error('placa')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="marca" value="{{$veiculo->marca ?? old('marca')}}"
                        class="form-control @error('marca') is-invalid @enderror" placeholder="Marca *">
                        @error('marca')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="modelo" value="{{$veiculo->modelo ?? old('modelo')}}"
                        class="form-control @error('modelo') is-invalid @enderror" placeholder="Modelo *">
                        @error('modelo')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="cor" value="{{$veiculo->cor ?? old('cor')}}"
                        class="form-control @error('cor') is-invalid @enderror" placeholder="Cor *">
                            @error('cor')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>
                <div class="row p-2">

                    <div class="col-md-3">
                        <input type="text" name="chassi" value="{{$veiculo->chassi ?? old('chassi')}}"
                            class="form-control" placeholder="Chassi">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="pais" value="{{$veiculo->pais ?? old('pais')}}"
                        class="form-control @error('pais') is-invalid @enderror" placeholder="País *">
                        @error('pais')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-4">
                        <select id="especie" name="especie" class="form-select @error('especie') is-invalid @enderror">
                            <option value="{{$veiculo->especie ?? old('especie')}}">{{$veiculo->especie ?? 'Espécie *'}}</option>
                            <option value="PASSAGEIRO">Passageiro</option>
                            <option value="CARGA">Carga</option>
                            <option value="MISTO">Misto</option>
                            <option value="COMPETIÇÃO">Competição</option>
                            <option value="TRAÇÃO">Tração</option>
                            <option value="ESPECIAL">Especial</option>
                            <option value="COLEÇÃO">Coleção</option>
                        </select>
                        @error('especie')<div style="color:red"><small>{{$message}}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <a data-bs-toggle="modal" data-bs-target="#modal_veiculos" aria-current="page"
                            class="btn btn-primary">Buscar</a>
                    </div>
                </div>

            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Identificação do Condutor</legend>
                <div class="row p-2">
                    <div class="col-md-6">
                        <input type="text" name="nome_condutor" value="{{$condutor->nome ?? old('nome_condutor')}}" class="form-control"
                            placeholder="Nome">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="cpf_condutor" value="{{$condutor->cpf ?? old('cpf_condutor')}}" class="form-control"
                            placeholder="CPF">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="rg_condutor" value="{{$condutor->rg ?? old('rg_condutor')}}" class="form-control"
                            placeholder="RG">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="cnh_condutor" value="{{$condutor->numero_cnh ?? old('cnh_condutor')}}" class="form-control"
                            placeholder="CNH">
                    </div>
                </div>
                <div class="row p-2">

                    <div class="col-md-3">
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
                        <input type="date" name="validade_cnh" value="{{$condutor->validade ?? old('validade_cnh')}}"
                            class="form-control" id="validade_cnh">
                    </div>
                    <div class="col-md-2">
                        <a data-bs-toggle="modal" data-bs-target="#modal_condutores" aria-current="page"
                            class="btn btn-primary">Buscar</a>
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Local/Data/Hora</legend>
                <div class="row p-2">
                    <div class="col-md-5">
                        <input type="text" name="logradouro" value="{{old('logradouro')}}"
                        class="form-control @error('logradouro') is-invalid @enderror" placeholder="Logradouro *">
                            @error('logradouro')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="numero" value="{{old('numero')}}"
                        class="form-control @error('numero') is-invalid @enderror" placeholder="Numero *">
                            @error('numero')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="bairro" value="{{old('bairro')}}"
                        class="form-control @error('bairro') is-invalid @enderror" placeholder="Bairro *">
                            @error('bairro')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="cidade" value="{{old('cidade')}}"
                        class="form-control @error('cidade') is-invalid @enderror" placeholder="Cidade *">
                            @error('cidade')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-5">
                        <input type="date" name="data" id="data" value="{{old('data')}}"
                        class="form-control @error('data') is-invalid @enderror" placeholder="Data *">
                            @error('data')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <input type="time" name="hora" value="{{old('hora')}}"
                        class="form-control @error('hora') is-invalid @enderror" placeholder="Hora">
                            @error('hora')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-2">
                        <input disabled type="text" name="uf_mg" value="MG" class="form-control"
                            placeholder="UF-MG">
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Identificação da Infração</legend>
                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="codigo_infracao" value="{{old('codigo_infracao')}}"
                        class="form-control @error('codigo_infracao') is-invalid @enderror" placeholder="Código Infracao *">
                        @error('codigo_infracao')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-9">
                        <input type="text" name="descricao" value="{{old('descricao')}}"
                        class="form-control @error('descricao') is-invalid @enderror" placeholder="Descrição *">
                        @error('descricao')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-3">
                        <input type="text" name="equipamento_afericao" value="{{old('equipamento_afericao')}}"
                            class="form-control" placeholder="Equipamento Aferição">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="medicao_realizada" value="{{old('medicao_realizada')}}"
                            class="form-control" placeholder="Medição Realizada">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="limite_regulamentado" value="{{old('limite_regulamentado')}}"
                            class="form-control" placeholder="Limite Regulamentado">
                    </div>

                    <div class="col-md-3">
                        <input type="text" name="valor_considerado" value="{{old('valor_considerado')}}"
                            class="form-control" placeholder="Valor Considerado">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md">
                        <textarea type="text" name="observacoes" value="{{old('observacoes')}}" class="form-control"
                            placeholder="Observações"></textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Medida Administrativa</legend>
                <div class="row p-2">
                    <div class="col-md-4">
                        <select id="medida1" name="medida1" value="{{old('medida1')}}" class="form-select">
                            <option value="{{$ait->medida1 ?? old('medida1')}}">{{$ait->medida1 ?? 'Medida Administrativa'}}</option>
                            <option value="REMOÇÃO">Remoção</option>
                            <option value="RECOLHIMENTO">Recolhimento</option>
                            <option value="RETENÇAO">Retenção</option>
                            <option value="TESTE DE ALCOOLEMIA">Teste de Alcoolemia</option>
                        </select>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select id="medida2" name="medida2" value="{{old('medida2')}}" class="form-select">
                            <option value="{{$ait->medida2 ?? old('medida2')}}">{{$ait->medida2 ?? 'Medida Administrativa'}}</option>
                            <option value="CNH/PPD/ACC">CNH/PPD/ACC</option>
                            <option value="CRLV">CRLV</option>
                            <option value="CRV">CRV</option>
                            <option value="VEÍCULO">Veículo</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="ficha_vistoria" value="{{old('ficha_vistoria')}}"
                            class="form-control" placeholder="Ficha de Vistoria">
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <legend>Anexar Imagem</legend>
                <div class="row p-2">
                    <div class="col-md-2">
                        <input type="button" class="btn_img" value="Selecionar Arquivo">
                    </div>

                    <div class="col-md-5">
                        <input type="file" name="imagem" id="arquivo" class="arquivo">
                        <input type="text" name="file" id="file" class="file" placeholder=""
                            readonly="readonly">
                    </div>
                </div>
            </fieldset>

            <fieldset class="shadow-sm p-4">
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg">Finalizar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

@endsection
