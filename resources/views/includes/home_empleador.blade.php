@if(Auth::user()->status == 1)
<div class="breadcome-area" style="margin-top:-30px;margin-bottom:-10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul>
                                <li>
                                    <label>CARRERA:</label>
                                    <select name="carrera" id="carrera" class="form-control">
                                        <option value="">TODOS</option>
                                        @foreach($carreras as $value)
                                        <option value="{{$value->id}}">{{$value->nom}}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="text" value="{{route('home')}}" id="url_paginacion" hidden>
<div class="courses-area" style="margin-bottom:20px;">
    <div class="container-fluid" id="lista">
        Total: {{$titulados->total()}} registros. Página {{$titulados->currentPage()}} de {{$titulados->lastPage()}}
        @php
        $sw = 0;   
        @endphp
        @foreach($titulados as $key => $value)
        @if($sw == 0)
        <div class="row">
        @endif
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="courses-inner res-mg-b-30">
                <div class="courses-title">
                    <a href="{{route('titulados.show',$value->id)}}" class="imagen_titulado"><img src="{{asset('imgs/titulados/'.$value->foto)}}" alt=""></a>
                    <h2 align="center">{{$value->nom}} {{$value->apep}} {{$value->apem}}</h2>
                </div>
                <div class="courses-alaltic">
                    <span class="cr-ic-r"><b>EDAD:</b> {{date('Y') - date('Y',strtotime($value->fecha_nac))}} AÑOS</span>
                    <span class="cr-ic-r"><b>GÉNERO:</b> {{$value->genero}}</span>
                </div>
                <div class="course-des">
                    <p><span><i class="fa fa-check"></i></span> <b>CARRERA:</b><br> {{$value->titulo->carrera->nom}}</p>
                    <p><span><i class="fa fa-check"></i></span> <b>GRADO ACADÉMICO:</b><br> {{$value->titulo->grado}}</p>
                </div>
                <div class="product-buttons">
                    <a href="{{route('titulados.show',$value->id)}}" class="btn btn-primary" style="background:#006DF0;">VER PERFIL</a>
                </div>
            </div>
        </div>
            @php
            $sw++;
            @endphp
            @if($sw == 4)
        </div> {{-- Cerrar el div.row si ya son 4 registros --}}
        <br>
            @php
            $sw = 0;   
            @endphp
            @endif
            @if($key == count($titulados))
            </div> {{-- Cerrar el div.row si es el ultimo registro --}}
            @endif
        @endforeach
        <div class="custom-pagination">
            {{$titulados->render()}}
        </div>
    </div>
</div>
@else
<div class="traffice-source-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <strong>Felicidades!</strong> Ya casi terminas de registrar tu cuenta. Para finalizar debes ir a tu correo y hacer click en el enlace.
                </div>
            </div>
        </div>
    </div>
</div>
@endif