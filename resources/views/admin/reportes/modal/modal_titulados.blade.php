<div id="modal_titulados" class="modal modal-edu-general FullColor-popup-InfoModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">TITULADOS</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'reportes.titulados','method'=>'get']) !!}
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Filtro:</label>
                            <select class="form-control" name="filtro" id="filtro">
                                <option value="TODOS">TODOS</option>
                                <option value="CARRERA">POR CARRERA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Carrera:</label>
                            <select class="form-control" name="carrera" id="carrera">
                                <option value="TODOS">TODOS</option>
                                @foreach($carreras as $carrera)
                                <option value="{{$carrera->id}}">{{$carrera->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha inicio:</label>
                            <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha fin:</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect">EXPORTAR</button >
                {!! Form::close() !!}
                <button class="btn btn-info waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>    
</div>