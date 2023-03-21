<div id="eliminar" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">Deshabilitar registro.</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>Atención!</h2>
                <p id="texto"></p>
                {!! Form::open(['method'=>'delete','id'=>'form']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">Cancelar</a>
                <a href="#" onclick="event.preventDefault();
                document.getElementById('form').submit();">Sí</a>
            </div>
        </div>
    </div>
</div>