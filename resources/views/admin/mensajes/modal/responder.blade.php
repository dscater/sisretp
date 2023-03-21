<div id="responder" class="modal modal-edu-general FullColor-popup-InfoModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Responder mensaje.</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="coment-area">
                    {!! Form::open(['route'=>['mensajes.enviar',$mensaje->emisor_id],'method'=>'post','id'=>'form_resp']) !!}
                        <div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3" id="alerta" style="display:none">
                            {{-- <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                </button> --}}
                            <i class="fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                            <p><strong>Atención!</strong> Debes completar todos los campos.</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-res-mg-bt">
                            <div class="form-group">
                                @if(Auth::user()->titulado)
                                <input name="nombre" id="nombre" value="{{Auth::user()->titulado->nom}} {{Auth::user()->titulado->apep}} {{Auth::user()->titulado->apem}}" class="responsive-mg-b-10" type="text" placeholder="Nombre completo"  required readonly/>
                                @else
                                <input name="nombre" id="nombre" value="" class="responsive-mg-b-10" type="text" placeholder="Nombre completo"  required/>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input name="razon" id="razon" type="text" placeholder="Asunto/Razón"  required/>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Mensaje" required></textarea>
                            </div>
                        </div>
                        <input type="text" name="email" value="{{Auth::user()->email}}" hidden required>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">Cancelar</a>
                <a href="" id="btn_enviar">Envíar.</a>
            </div>
        </div>
    </div>
</div>