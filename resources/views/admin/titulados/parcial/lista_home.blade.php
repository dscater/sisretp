Total: {{$titulados->total()}} registros. Página {{$titulados->currentPage()}} de {{$titulados->lastPage()}}
@php
$sw = 0;   
@endphp
@foreach($titulados as $key => $value)
@if($sw < 4)
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
</div>
@endif
@endforeach
@if($sw < 4)
</div>
@endif
<div class="custom-pagination">
    {{$titulados->render()}}
</div>