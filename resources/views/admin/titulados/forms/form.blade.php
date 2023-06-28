<div id="wizard">
    <h2>Información</h2>
    <section>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre(s)*</label>
                {{ Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nombre(s)*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Paterno*</label>
                {{ Form::text('apep', null, ['class' => 'form-control', 'placeholder' => 'Paterno*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Materno</label>
                {{ Form::text('apem', null, ['class' => 'form-control', 'placeholder' => 'Materno']) }}
            </div>
            <div class="form-group">
                <label>C.I.*</label>
                {{ Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'C.I.*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Expedido*</label>
                {{ Form::select('ci_exp', ['' => 'Expedido', 'LP' => 'LA PAZ', 'CB' => 'COCHABAMBA', 'SC' => 'SANTA CRUZ', 'OR' => 'ORURO', 'PT' => 'POTOSI', 'CH' => 'CHUQUISACA', 'TJ' => 'TARIJA', 'BN' => 'BENI', 'PD' => 'PANDO'], null, ['class' => 'form-control', 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <label>&nbsp;</label>
            @if (isset($titulado))
                <div class="form-group contenedor_foto">
                    <img src="{{ asset('imgs/titulados/' . $titulado->foto) }}" width="150" height="155"
                        id="imagen_select">
                    <div class="form-group form-float contenedor_subir">
                        <div class="form-line">
                            <input type="file" accept="image/*" style='opacity: 0;' name="foto" class="file"
                                id="foto">
                            <label class="subir"for="foto">
                                <i class="fa fa-image"></i> <span>Elegir foto*</span>
                                <span id="nom_img"></span>
                            </label>
                        </div>
                    </div>
                </div>
            @else
                <div class="form-group contenedor_foto">
                    <img src="{{ asset('imgs/users/user_default.png') }}" width="150" height="155"
                        id="imagen_select">
                    <div class="form-group form-float contenedor_subir">
                        <div class="form-line">
                            <input type="file" accept="image/*" style='opacity: 0;' name="foto" class="file"
                                id="foto" required="">
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
                {{ Form::date('fecha_nac', null, ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                <label>Género*</label>
                {{ Form::select('genero', ['' => 'Género', 'M' => 'MASCULINO', 'F' => 'FEMENINO'], null, ['class' => 'form-control', 'required']) }}
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
                {{ Form::text('dir_pais', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) }}
            </div>
            <div class="form-group">
                <label>Ciudad*</label>
                {{ Form::text('dir_ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Zona/Barrio*</label>
                {{ Form::text('dir_z', null, ['class' => 'form-control', 'placeholder' => 'Zona/Avenida*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Avenida/Calle*</label>
                {{ Form::text('dir_ac', null, ['class' => 'form-control', 'placeholder' => 'Avenida/Calle*', 'required']) }}
            </div>
            <div class="form-group">
                <label>Número*</label>
                {{ Form::text('dir_num', null, ['class' => 'form-control', 'placeholder' => 'Número*', 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="lead-head">
                <h3>Teléfono/Celular</h3>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                {{ Form::text('fono', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) }}
            </div>
            <div class="form-group">
                <label>Celular*</label>
                {{ Form::text('cel', null, ['class' => 'form-control', 'placeholder' => 'Celular*', 'required']) }}
            </div>
        </div>
    </section>

    <h2>Titulo</h2>
    <section>
        <div id="contenedor_titulos">
            @if (isset($titulado))
                @foreach ($titulado->titulos as $titulo)
                    <div class="titulo" data-id="{{ $titulo->id }}">
                        <input type="hidden" value="{{ $titulo->id }}" name="id_titulos[]" />
                        <div class="col-md-12 contenedor_quitar">
                            <button type="button" class="btn btn-danger btn-sam quitar"><i
                                    class="fa fa-times"></i></button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Universidad*</label>
                                {{ Form::text('uni[]', $titulo->uni, ['class' => 'form-control', 'placeholder' => 'Universidad*', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Número*</label>
                                {{ Form::text('num[]', $titulo->num, ['class' => 'form-control', 'placeholder' => 'Número']) }}
                            </div>
                            <div class="form-group">
                                <label>Serie*</label>
                                {{ Form::text('serie[]', $titulo->serie, ['class' => 'form-control', 'placeholder' => 'Serie*', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Grado académico*</label>
                                {{ Form::select('grado[]', ['' => 'SELECIONAR GRADO', 'TÉCNICO MEDIO' => 'TÉCNICO MEDIO', 'TÉCNICO SUPERIOR' => 'TÉCNICO SUPERIOR', 'LICENCIATURA' => 'LICENCIATURA', 'POSTGRADO' => 'POSTGRADO', 'MAESTRÍA' => 'MAESTRÍA', 'DOCTORADO' => 'DOCTORADO', 'POSTDOCTORADO' => 'POSTDOCTORADO'], $titulo->grado, ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Título profesional*</label>
                                {{ Form::text('titulo_prof[]', $titulo->titulo_prof, ['class' => 'form-control', 'placeholder' => 'Título profesional*', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Fecha*</label>
                                {{ Form::date('fecha_t[]', $titulo->fecha_t, ['class' => 'form-control', 'placeholder' => 'Fecha*', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Carrera*</label>
                                {{ Form::select('carrera_id[]', $array_carreras, $titulo->carrera_id, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label>Subir titulo</label>
                                <input type="file" name="input_titulo[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <iframe src="{{ asset('files/titulos/' . $titulo->titulo) }}" frameborder="0"
                                style="width:100%;height:500px;margin-bottom:15px;"></iframe>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="titulo" data-id="0">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Universidad*</label>
                            {{ Form::text('uni[]', null, ['class' => 'form-control', 'placeholder' => 'Universidad*', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Número*</label>
                            {{ Form::text('num[]', null, ['class' => 'form-control', 'placeholder' => 'Número']) }}
                        </div>
                        <div class="form-group">
                            <label>Serie*</label>
                            {{ Form::text('serie[]', null, ['class' => 'form-control', 'placeholder' => 'Serie*', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Grado académico*</label>
                            {{ Form::select('grado[]', ['' => 'SELECIONAR GRADO', 'TÉCNICO MEDIO' => 'TÉCNICO MEDIO', 'TÉCNICO SUPERIOR' => 'TÉCNICO SUPERIOR', 'LICENCIATURA' => 'LICENCIATURA', 'POSTGRADO' => 'POSTGRADO', 'MAESTRÍA' => 'MAESTRÍA', 'DOCTORADO' => 'DOCTORADO', 'POSTDOCTORADO' => 'POSTDOCTORADO'], null, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Título profesional*</label>
                            {{ Form::text('titulo_prof[]', null, ['class' => 'form-control', 'placeholder' => 'Título profesional*', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Fecha*</label>
                            {{ Form::date('fecha_t[]', null, ['class' => 'form-control', 'placeholder' => 'Fecha*', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Carrera*</label>
                            {{ Form::select('carrera_id[]', $array_carreras, null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            <label>Subir titulo*</label>
                            <input type="file" name="input_titulo[]" class="form-control" required>
                        </div>
                    </div>
                </div>
            @endif
            <div id="eliminados"></div>
        </div>

        <div class="col-md-12" style="margin-top:15px; margin-bottom:15px;">
            <button type="button" onclick="agregarTitulo()" class="btn btn-primary btn-block btn-flat"><i
                    class="fa fa-plus"></i> Agregar título</button>
        </div>
    </section>

    <h2>Postgrado</h2>
    <section>
        <div id="contenedor_postgrados">
            @if (isset($titulado))
                @foreach ($titulado->postgrados as $postgrado)
                    <div class="titulo" data-id="{{ $postgrado->id }}">
                        <input type="hidden" value="{{ $postgrado->id }}" name="id_postgrados[]" />
                        <div class="col-md-12 contenedor_quitar postgrado">
                            <button type="button" class="btn btn-danger btn-sam quitar"><i
                                    class="fa fa-times"></i></button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>País</label>
                                {{ Form::text('pais[]', $postgrado->pais, ['class' => 'form-control', 'placeholder' => 'País']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Universidad</label>
                                {{ Form::text('universidad[]', $postgrado->universidad, ['class' => 'form-control', 'placeholder' => 'Universidad']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de Postgrado o Especialidad</label>
                                {{ Form::text('nombre[]', $postgrado->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre de Postgrado o Especialidad']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de inicio</label>
                                {{ Form::date('fecha_ini[]', $postgrado->fecha_ini, ['class' => 'form-control', 'placeholder' => 'Fecha de inicio*']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de conclusión</label>
                                {{ Form::date('fecha_fin[]', $postgrado->fecha_fin, ['class' => 'form-control', 'placeholder' => 'Fecha de conclusión*']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de curso</label>
                                {{ Form::select('tipo[]', ['' => 'SELECIONAR TIPO', 'POSTGRADO' => 'POSTGRADO', 'ESPECIALIDAD' => 'ESPECIALIDAD'], $postgrado->tipo, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subir diploma</label>
                                <input type="file" name="input_diploma[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <iframe src="{{ asset('files/titulos/' . $postgrado->diploma) }}" frameborder="0"
                                style="width:100%;height:500px;margin-bottom:15px;"></iframe>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- <div class="titulo" data-id="0">
                    <input type="hidden" value="0" name="id_postgrados[]" />
                    <div class="col-md-12 contenedor_quitar postgrado">
                        <button type="button" class="btn btn-danger btn-sam quitar"><i
                                class="fa fa-times"></i></button>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>País</label>
                            {{ Form::text('pais[]', null, ['class' => 'form-control', 'placeholder' => 'País']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Universidad</label>
                            {{ Form::text('universidad[]', null, ['class' => 'form-control', 'placeholder' => 'Universidad']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de Postgrado o Especialidad</label>
                            {{ Form::text('nombre[]', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Postgrado o Especialidad']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de inicio</label>
                            {{ Form::date('fecha_ini[]', null, ['class' => 'form-control', 'placeholder' => 'Fecha de inicio*']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de conclusión</label>
                            {{ Form::date('fecha_fin[]', null, ['class' => 'form-control', 'placeholder' => 'Fecha de conclusión*']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo de curso</label>
                            {{ Form::select('tipo[]', ['' => 'SELECIONAR TIPO', 'POSTGRADO' => 'POSTGRADO', 'ESPECIALIDAD' => 'ESPECIALIDAD'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subir diploma</label>
                            <input type="file" name="input_diploma[]" class="form-control">
                        </div>
                    </div>
                </div> --}}
            @endif
            <div id="eliminados"></div>
            <div id="eliminados_postgrados"></div>
        </div>

        <div class="col-md-12" style="margin-top:15px; margin-bottom:15px;">
            <button type="button" onclick="agregarPostgrado()" class="btn btn-primary btn-block btn-flat"><i
                    class="fa fa-plus"></i> Agregar postgrado</button>
        </div>
    </section>
</div>
