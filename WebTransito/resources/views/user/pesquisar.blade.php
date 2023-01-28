@extends('layout')
@section('content')

    <div class="container-fluid m-auto p-4 position-static h-auto shadow-sm" id="pesquisar">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                @if (session('msg'))
                    <div class="col-md-6 alert alert-info">
                        <p>{{session('msg')}}</p>
                    </div>
                @endif
                <div class="col-md-3"></div>
            </div>
            <form class="row g-3" method="POST" action="{{route('pesquisar.users')}}">

                @csrf

                <fieldset class="shadow-sm p-4">
                    <legend>Pesquisa de Usuário</legend>
                    <div class="row p-2 align-content-center">
                        <div class="col-md-3">
                            <input type="text" name="matricula" class="form-control" placeholder="Matrícula" >
                        </div>

                        <div class="col-md-5">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" >
                        </div>

                        <div class="col-md-2">
                            <select name="orgao" class="form-select">
                                <option value="">Institução</option>
                                <option value="PMMG">PMMG</option>
                                <option value="PCMG">PCMG</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-select">
                                <option value="">Situação</option>
                                <option value= "1">Ativo</option>
                                <option value= "0">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row p-2 align-content-center">
                        <div class="col-md">
                            <button type="submit" class="btn btn-primary btn-md">Pesquisar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    @if ($users)
        <div class="container-fluid m-auto p-4 position-static h-auto d-md-inline-flex shadow-sm" id="table">
            <table class="table table-primary table-striped caption-top">
                <caption>Resultado da Pesquisa</caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Orgão</th>
                        <th scope="col">Situação</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->matricula}}</th>
                            <td>{{$user->nome}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->orgao}}</td>
                            <td>{{($user->status == 0)? 'INATIVO' :'ATIVO'}}</td>
                            <td>
                                <a href="{{route('user.edit', ['id' => $user->id])}}"> <button class="btn btn-sm btn-secondary">Editar</button></a>
                            </td>
                            <td>
                                <form id="form_{{$user->id}}" method="POST" action="{{route('user.destroy', ['id' => $user->id])}}">
                                    @method('DELETE')
                                    @csrf

                                    <a href="" onclick="document.getElementById('form_{{$user->id}}').submit()"> <button class="btn btn-sm btn-danger">Excluir</button></a>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container-fluid w-100" >
            <div class="py-4">
                {{$users->appends([
                    'matricula'=> request()->get('matricula', ''),
                    'nome'=> request()->get('nome', ''),
                    'orgao'=> request()->get('orgao', ''),
                    'status'=> request()->get('status', '')
                ])->links()}}
            </div>
        </div>
    @endif
@endsection
