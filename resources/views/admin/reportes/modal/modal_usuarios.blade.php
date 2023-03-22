<div id="modal_usuarios" class="modal modal-edu-general FullColor-popup-InfoModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">USUARIOS</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'reportes.usuarios', 'method' => 'get', 'target' => '_blank']) !!}
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Filtro:</label>
                            <select class="form-control" name="filtro_usuarios" id="filtro_usuarios">
                                <option value="TODOS">TODOS</option>
                                <option value="USUARIOS">POR USUARIO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 oculto">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <select class="form-control" name="id_usuarios" id="id_usuarios">
                                <option value="TODOS">TODOS</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->paterno_nombre }}</option>
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
