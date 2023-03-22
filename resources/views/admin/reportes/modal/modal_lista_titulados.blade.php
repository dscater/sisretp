<div id="modal_lista_titulados" class="modal modal-edu-general FullColor-popup-InfoModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Titulados</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'reportes.lista_titulados', 'method' => 'get', 'target' => '_blank']) !!}
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Filtro:</label>
                            <select class="form-control" name="filtro" id="filtro">
                                <option value="TODOS">TODOS</option>
                                <option value="TITULADO">POR TITULADO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Titulado:</label>
                            <select class="form-control" name="titulado" id="titulado">
                                <option value="TODOS">TODOS</option>
                                @foreach ($titulados as $value)
                                    <option value="{{ $value->id }}">{{ $value->paterno_nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect">EXPORTAR</button>
                {!! Form::close() !!}
                <button class="btn btn-info waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
