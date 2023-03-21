<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Nombre(s)*</label>
            {{Form::text('nom',null,['class'=>'form-control','placeholder'=>'Nombre(s)*','required'])}}
        </div>
        <div class="form-group">
            <label>Paterno*</label>
            {{Form::text('apep',null,['class'=>'form-control','placeholder'=>'Paterno*','required'])}}
        </div>
        <div class="form-group">
            <label>Materno</label>
            {{Form::text('apem',null,['class'=>'form-control','placeholder'=>'Materno'])}}
        </div>
        <div class="form-group">
            <label>C.I.*</label>
            {{Form::text('ci',null,['class'=>'form-control','placeholder'=>'C.I.*','required'])}}
        </div>
        <div class="form-group">
            <label>Expedido*</label>
            {{Form::select('ci_exp',[
                '' => 'Expedido',
                'LP'=>'LA PAZ',
                'CB'=>'COCHABAMBA',
                'SC'=>'SANTA CRUZ',
                'OR'=>'ORURO',
                'PT'=>'POTOSI',
                'CH'=>'CHUQUISACA',
                'TJ'=>'TARIJA',
                'BN'=>'BENI',
                'PD'=>'PANDO',
            ],null,['class'=>'form-control','required'])}}
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            {{Form::text('fono',null,['class'=>'form-control','placeholder'=>'Teléfono'])}}
        </div>
        <div class="form-group res-mg-t-15">
            <label>Celular*</label>
            {{Form::text('cel',null,['class'=>'form-control','placeholder'=>'Celular*','required'])}}
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if(isset($datosUsuario))
        <div class="form-group contenedor_foto">
            <img src="{{ asset('imgs/personal/'.$datosUsuario->foto) }}" width="150" height="155" id="imagen_select">
            <div class="form-group form-float contenedor_subir">
                <div class="form-line">
                    <input type="file" accept="image/*" style='opacity: 0;' name="foto" class="file" id="foto">
                    <label class="subir"for="foto">
                        <i class="fa fa-image"></i> <span>Elegir foto*</span>
                        <span id="nom_img"></span>
                    </label>
                </div>
            </div>
        </div>
        @else
        <div class="form-group contenedor_foto">
            <img src="{{ asset('imgs/users/user_default.png') }}" width="150" height="155" id="imagen_select">
            <div class="form-group form-float contenedor_subir">
                <div class="form-line">
                    <input type="file" accept="image/*" style='opacity: 0;' name="foto" class="file" id="foto" required="">
                    <label class="subir"for="foto">
                        <i class="fa fa-image"></i> <span>Elegir foto*</span>
                        <span id="nom_img"></span>
                    </label>
                </div>
            </div>
        </div>
        @endif
        <div class="form-group">
            <label>Tipo de usuario*</label>
            {{Form::select('tipo',[
                '' => 'Tipo de usuario',
                'ADMINISTRADOR'=>'ADMINISTRADOR',
                'AUXILIAR'=>'AUXILIAR',
            ],isset($datosUsuario)? $datosUsuario->user->tipo:null,['class'=>'form-control','required'])}}
        </div>
        <div class="form-group">
            <label>E-mail*</label>
            {{Form::email('email',isset($datosUsuario)? $datosUsuario->user->email:null,['class'=>'form-control','placeholder'=>'E-mail*','required'])}}
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>