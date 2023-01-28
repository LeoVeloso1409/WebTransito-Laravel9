@extends('layout')


@section('content')

    <div class="container-fluid m-auto p-4 position-static h-auto shadow-sm" id="register">
        <legend><h3>Cadastro de Usuário</h3></legend>

        <div class="row">
            <div class="col-md-3"></div>
            @if (session('msg'))
                <div class="col-md-6 alert alert-info">
                    <p>{{session('msg')}}</p>
                </div>
            @endif
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                    <h6 style="color:cadetblue">* Campos com preenchimento obrigatório!</h6>
            </div>
        </div>

        <form class="row g-3" method="POST" action="{{route('user.store')}}">

            @csrf

            <fieldset class="shadow-sm p-4">

                <div class="row p-2">
                    <!-- Nome -->
                    <div class="col-md-4">
                        <input id="nome" class="form-control block mt-1 w-full @error('nome') is-invalid @enderror" type="text" name="nome" value="{{old('nome')}}"
                            placeholder="Nome *" autofocus />
                            @error('nome')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                    <!-- Matrícula -->
                    <div class="col-md-4">
                        <input id="matricula" class="form-control block mt-1 w-full @error('matricula') is-invalid @enderror" type="text" name="matricula"
                            value="{{old('matricula')}}" placeholder="Matrícula *" autofocus />
                            @error('matricula')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <!-- Email -->
                    <div class="col-md-4">
                        <input id="email" class="form-control block mt-1 w-full @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}"
                            placeholder="Email *" autofocus />
                            @error('email')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-md-3">
                        <select id="orgao" name="orgao" class="form-select @error('orgao') is-invalid @enderror">
                            <option value="">Orgão *</option>
                            <option value="PMMG" {{old('orgao') == 'PMMG' ? 'selected' : ''}}>PMMG</option>
                            <option value="PCMG" {{old('orgao') == 'PCMG' ? 'selected' : ''}}>PCMG</option>
                        </select>
                        @error('orgao')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-3">
                        <select id="unidade" name="unidade" class="form-select @error('unidade') is-invalid @enderror">
                            <option value="">Unidade *</option>
                            <option value="1 BPM" {{old('unidade') == '1 BPM' ? 'selected' : ''}}>1 BPM</option>
                            <option value="2 BPM" {{old('unidade') == '2 BPM' ? 'selected' : ''}}>2 BPM</option>
                            <option value="3 BPM" {{old('unidade') == '3 BPM' ? 'selected' : ''}}>3 BPM</option>
                            <option value="...">...</option>
                            <option value="55 BPM" {{old('unidade') == '55 BPM' ? 'selected' : ''}}>55BPM</option>
                        </select>
                        @error('unidade')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-3">
                        <select id="funcao" name="funcao" class="form-select @error('funcao') is-invalid @enderror">
                            <option value="">Função *</option>
                            <option value="ADMIN" {{old('funcao') == 'ADMIN' ? 'selected' : ''}}>ADMINISTRADOR</option>
                            <option value="AGENTE" {{old('funcao') == 'AGENTE' ? 'selected' : ''}}>AGENTE</option>
                        </select>
                        @error('funcao')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <div class="col-md-3">
                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="">Situação *</option>
                            <option value="1" {{old('status') == '1' ? 'selected' : ''}}>ATIVO</option>
                            <option value="0" {{old('status') == '0' ? 'selected' : ''}}>INATIVO</option>
                        </select>
                        @error('status')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>

                <div class="row p-2">

                    <!-- Password -->
                    <div class="col-md-4">
                        <input id="password" class="form-control block mt-1 w-full @error('password') is-invalid @enderror" type="password" name="password"
                            value="{{old('password')}}" placeholder="Senha *" autofocus/>
                            @error('password')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-4">
                        <input id="password_confirmation" class="form-control block mt-1 w-full @error('password_confirmation') is-invalid @enderror" type="password"
                        value="{{old('password_confirmation')}}" name="password_confirmation"
                        placeholder="Confirmar Senha *" autofocus/>
                        @error('password_confirmation')<div style="color:red"><small>{{ $message }}</small></div>@enderror
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row p-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
