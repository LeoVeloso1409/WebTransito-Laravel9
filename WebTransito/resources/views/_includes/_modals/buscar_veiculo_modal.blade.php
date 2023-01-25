<!-- Modal Pesquisar Veículo -->
<div class="modal fade" id="modal_veiculos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pesquisar Veiculo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form class="row g-3" method="POST" action="{{route('buscar.veiculo')}}">
                    @csrf
                    <div class="modal-body">
                        <p>Preencha um dos campos para buscar dados do Veículo.</p>

                        <br>

                        <input hidden type="text" name="ait_id" value="{{$ait->id ?? ''}}">

                        <div class="row p-2">
                            <div class="col-md-4">
                                <input type="text" name="placa" value="{{$veiculo->placa ?? old('placa')}}"
                                    class="form-control" placeholder="Placa">
                            </div>

                            <div class="col-md-1">
                                <p>ou</p>
                            </div>

                            <div class="col-md-5">
                                <input type="text" name="chassi" value="{{$veiculo->chassi ?? old('chassi')}}"
                                    class="form-control" placeholder="Chassi">
                            </div>
                        </div>
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
