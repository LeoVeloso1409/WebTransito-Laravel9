<!-- Modal Novo AIT -->
<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Atenção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form method="POST" action="{{route('ait.store')}}">
                    @csrf

                    @php
                        $cod_ait = App\Http\Controllers\WebtransitoController::gerarCodAit();
                    @endphp

                    <input hidden type="text" name="user_id" value="{{$user->id}}">
                    <input hidden type="text" name="cod_ait" value="{{$cod_ait}}">
                    <input hidden type="text" name="orgao_autuador" value="{{$user->orgao}}">
                    <input hidden type="text" name="matricula" value="{{$user->matricula}}">
                    <input hidden type="text" name="nome" value="{{$user->nome}}">

                    <div class="modal-body">
                        <p>Ao Iniciar uma autuação ela não poderá mais ser cancelada.</p>
                        <br>
                        <p>Deseja realmente continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
