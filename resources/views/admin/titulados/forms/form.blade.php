<div id="wizard">
    <h2>Información</h2>
    <section>
            <div class="col-md-6">
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
                </div>
            <div class="col-md-6">
                <label>&nbsp;</label>
                @if(isset($titulado))
                <div class="form-group contenedor_foto">
                    <img src="{{ asset('imgs/titulados/'.$titulado->foto) }}" width="150" height="155" id="imagen_select">
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
                    <label>Fecha de nacimiento*</label>
                    {{Form::date('fecha_nac',null,['class'=>'form-control','required'])}}
                </div>
                <div class="form-group">
                    <label>Género*</label>
                    {{Form::select('genero',[
                        '' => 'Género',
                        'M' => 'MASCULINO',
                        'F' => 'FEMENINO',
                    ],null,['class'=>'form-control','required'])}}
                </div>
            </div>
    </section>

    <h2>Contacto</h2>
    <section>
        <div class="col-md-6">
            <div class="lead-head">
                <h3>Dirección</h3>
            </div>
            <div class="form-group">
                <label>País*</label>
                {{Form::text('dir_pais',null,['class'=>'form-control','placeholder'=>'País','required'])}}
            </div>
            <div class="form-group">
                <label>Ciudad*</label>
                {{Form::text('dir_ciudad',null,['class'=>'form-control','placeholder'=>'Ciudad*','required'])}}
            </div>
            <div class="form-group">
                <label>Zona/Barrio*</label>
                {{Form::text('dir_z',null,['class'=>'form-control','placeholder'=>'Zona/Avenida*','required'])}}
            </div>
            <div class="form-group">
                <label>Avenida/Calle*</label>
                {{Form::text('dir_ac',null,['class'=>'form-control','placeholder'=>'Avenida/Calle*','required'])}}
            </div>
            <div class="form-group">
                <label>Número*</label>
                {{Form::text('dir_num',null,['class'=>'form-control','placeholder'=>'Número*','required'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="lead-head">
                <h3>Teléfono/Celular</h3>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                {{Form::text('fono',null,['class'=>'form-control','placeholder'=>'Teléfono'])}}
            </div>
            <div class="form-group">
                <label>Celular*</label>
                {{Form::text('cel',null,['class'=>'form-control','placeholder'=>'Celular*','required'])}}
            </div>
        </div>
    </section>

    <h2>Titulo</h2>
    <section>
        <div class="col-md-6">
            <div class="form-group">
                <label>Universidad*</label>
                {{Form::text('uni',isset($titulado)?$titulado->titulo->uni:null,['class'=>'form-control','placeholder'=>'Universidad*','required'])}}
            </div>
            <div class="form-group">
                <label>Número*</label>
                {{Form::text('num',isset($titulado)?$titulado->titulo->num:null,['class'=>'form-control','placeholder'=>'Número'])}}
            </div>
            <div class="form-group">
                <label>Serie*</label>
                {{Form::text('serie',isset($titulado)?$titulado->titulo->serie:null,['class'=>'form-control','placeholder'=>'Serie*','required'])}}
            </div>
            <div class="form-group">
                <label>Grado académico*</label>
                {{Form::select('grado',[
                    '' => 'SELECIONAR GRADO',
                    'TÉCNICO MEDIO' => 'TÉCNICO MEDIO',
                    'TÉCNICO SUPERIOR' => 'TÉCNICO SUPERIOR',
                    'LICENCIATURA' => 'LICENCIATURA',
                    'POSTGRADO' => 'POSTGRADO',
                    'MAESTRÍA' => 'MAESTRÍA',
                    'DOCTORADO' => 'DOCTORADO',
                    'POSTDOCTORADO' => 'POSTDOCTORADO'
                ],isset($titulado)?$titulado->titulo->grado:null,['class'=>'form-control','required'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Título profesional*</label>
                {{Form::text('titulo_prof',isset($titulado)?$titulado->titulo->titulo_prof:null,['class'=>'form-control','placeholder'=>'Título profesional*','required'])}}
            </div>
            <div class="form-group">
                <label>Fecha*</label>
                {{Form::date('fecha_t',isset($titulado)?$titulado->titulo->fecha_t:null,['class'=>'form-control','placeholder'=>'Fecha*','required'])}}
            </div>
            <div class="form-group">
                <label>Carrera*</label>
                {{Form::select('carrera_id',$array_carreras,isset($titulado)?$titulado->titulo->carrera_id:null,['class'=>'form-control','required'])}}
            </div>
            @if(isset($titulado))
            <div class="form-group">
                <label>Subir titulo*</label>
                <input type="file" name="titulo" id="titulo" class="form-control">
            </div>
            @else
            <div class="form-group">
                <label>Subir titulo*</label>
                <input type="file" name="titulo" id="titulo" class="form-control" required>
            </div>
            @endif
        </div>
        @if(isset($titulado))
        <div class="col-md-8 col-md-offset-2">
            <iframe src="{{asset('files/titulos/'.$titulado->titulo->titulo)}}" frameborder="0" style="width:100%;height:500px;margin-bottom:15px;"></iframe>
        </div>
        @endif
    </section>
</div>