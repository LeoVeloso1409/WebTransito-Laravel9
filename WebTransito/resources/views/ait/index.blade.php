@extends('layout')

@section('content')
    <div class="container-fluid m-auto p-4 position-static h-auto shadow-sm" id="table">
        <div class="row">
            <div class="col-md-3"></div>
            @if (session('msg'))
                <small>
                    <div class="col-md-6 alert alert-info">
                        <p>{{session('msg')}}</p>
                    </div>
                </small>
            @endif
            <div class="col-md-3"></div>
        </div>
        <table class="table table-primary table-striped caption-top">
            <caption>{{(empty($aitsTrue)) ? 'Lista de Autuações Pendentes' : 'Lista de Autuaçoes Finalizadas'}}</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código AIT</th>
                    <th scope="col">Código Infração</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">{{(empty($aitsTrue)) ? 'Expira Em' : 'Encerrada Em'}}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (empty($aitsTrue))
                    @foreach ($aits as $ait)
                        <tr>
                            <th scope="row">{{$ait->cod_ait ?? '-'}}</th>
                            <td>{{$ait->codigo_infracao ?? '-'}}</td>
                            <td>{{$ait->placa ?? '-'}}</td>
                            <td>{{$ait->created_at->format('d-m-Y H:i:s') ?? '-'}}</td>
                            <td>"Em breve"</td>
                            <td>
                                <a href="{{route('ait.edit', $ait->id)}}"> <button class="btn btn-sm btn-secondary">Iniciar</button></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($aitsTrue as $ait)
                        <tr>
                            <th scope="row">{{$ait->cod_ait ?? '-'}}</th>
                            <td>{{$ait->codigo_infracao ?? '-'}}</td>
                            <td>{{$ait->placa ?? '-'}}</td>
                            <td>{{$ait->created_at->format('d-m-Y H:i:s') ?? '-'}}</td>
                            <td>{{$ait->updated_at->format('d-m-Y H:i:s') ?? ''}}</td>
                            <td>
                                <a href="route('ait.show', $ait->id)"> <button class="btn btn-sm btn-secondary">Visualizar</button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @if (empty($aitsTrue))
        <div class="py-4">
            {{$aits->links()}}
        </div>
    @else
        <div class="py-4">
            {{$aitsTrue->links()}}
        </div>
    @endif
@endsection


