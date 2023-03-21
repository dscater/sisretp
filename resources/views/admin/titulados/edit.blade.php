@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">
<link rel="stylesheet" href="{{asset('recursos_vistas/jquery-steps-master/demo/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('recursos_vistas/jquery-steps-master/demo/css/main.css')}}">
<link rel="stylesheet" href="{{asset('recursos_vistas/jquery-steps-master/demo/css/jquery.steps.css')}}">
<style>
/* ESTILOS DE LA PLANTILLA */
.wizard > .content{
    overflow: auto;
    max-height: 100%!important;
    background:#ffffff;
    border:solid 1px #d3d3d3;
}

.wizard > .content > .body input:focus {
    border-color: #006DF0;
    outline: 0;
    box-shadow: none;
}

/* FIN ESTILOS DE LA PLANTILLA */


div.form-group.contenedor_subir{
    position: relative;
}

#foto{
max-width: 100%;
}

.subir{
    margin: auto;
    display: flex;
    width: 100%;
    padding: 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
    z-index: 100;
    max-width: 285px;
    max-height: 45px;
}

#nom_img{
    width: 73%;
    text-overflow:ellipsis;
    white-space:nowrap; 
    overflow:hidden; 
}

.subir span{
    margin-left: 5px;
    z-index: 100;
    width: 25%;
}

.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #F44336;
}

.contenedor_foto{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px!important;
}

.contenedor_subir .form-line.error{
    position: relative;
}

.contenedor_subir label.error{
    position: absolute;
    bottom: -40px;
}

.contenedor_subir em.invalid{
    position: absolute;
    bottom: 25px;
    bottom: 50px;
}

/* ul[role="tablist"] li{
    height: 40px;
} */
.wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a{
    color:#006DF0;
    border-radius: 0%;
}

.wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
    background:#006DF0;
    color:white;
}
</style>

@endsection
@section('logo')
{{asset('imgs/empresa/'.$empresa->logo)}}
@endsection
@section('empresa_nom')
<h4>{{$empresa->name}}</h4>
@endsection

@section('buscador')
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4>Editar perfil</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Editar perfil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<input type="text" id="url_edit" value="{{route('titulados.edit',$titulado->id)}}" hidden>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            {!! Form::model($titulado,['route'=>['titulados.update',$titulado->id],'method'=>'post','id'=>'demo1-upload','files'=>'true','class'=>'dropzone dropzone-custom needsclick add-professors']) !!}
                                                @include('admin.titulados.forms.form')
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
{{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}

<!-- form validate JS
============================================ -->
<script src="{{asset('kiaalap-master/js/form-validation/jquery.form.min.js')}}"></script>
<script src="{{asset('kiaalap-master/js/form-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('kiaalap-master/js/form-validation/form-active.js')}}"></script>

<!-- pdf JS
============================================ -->
<script src="{{asset('kiaalap-master/js/pdf/jquery.media.js')}}"></script>
<script src="{{asset('kiaalap-master/js/pdf/pdf-active.js')}}"></script>

{{-- STEPS --}}
<script src="{{asset('recursos_vistas/jquery-steps-master/lib/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('recursos_vistas/jquery-steps-master/lib/jquery.cookie-1.3.1.js')}}"></script>
<script src="{{asset('recursos_vistas/jquery-steps-master/build/jquery.steps.js')}}"></script>
<script src="{{asset('js/crear_titulado.js')}}"></script>
<script>
    $(function ()
    {
        var form = $("#demo1-upload");

        form.children("div").steps({
            enableAllSteps: true,
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            showFinishButtonAlways: true,
            labels:{
                next:'Siguiente',
                previous:'Anterior',
                finish:'Finalizar',
            },
            onInit: function (event, currentIndex) {
                // $.AdminBSB.input.activate();

                //Set tab width
                var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
                var tabCount = $tab.length;
                $tab.css('width', (100 / tabCount) + '%');
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                
                if(form.valid())
                {
                    $('#demo1-upload a[href="#finish"]').prop('disabled','disabled');
                    $('#demo1-upload a[href="#finish"]').css('background','#7E7E7E');
                    $('#demo1-upload a[href="#finish"]').text('Actualizando...');

                    $('#demo1-upload a[href="#finish"]').css('pointer-events','none');
                    $('#demo1-upload a[href="#finish"]').css('cursor','default');
                    $('#demo1-upload a[href="#finish"]').css('opacity',0.6);
                }

                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                actualizar();
            }
        });

        form.validate({
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            },
            rules: {
                'confirm': {
                    equalTo: '#password'
                }
            }
        });
    });
</script>

<script>
    @if(isset($_GET['sw']))
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'ÉXITO!.',
        title: 'Actualización exitosa.',
    });
    @endif
    $('body').on('change','#foto',function(e){
        try{
        addImage(e);
        }
        catch(error){
            $('#nom_img').text(error);
        }
    });

    function addImage(e){
        if(e.target.files[0] == undefined)
        {
            throw ": No seleccionado...";
        }
        
        var file = e.target.files[0],
        imageType = /image.*/;
        $('#nom_img').text(': '+file.name);

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.onload = fileOnload;
        reader.readAsDataURL(file);
    }

    function fileOnload(e) {
        var result=e.target.result;
        $('#imagen_select').attr("src",result);
    }

    $('#foto').change(function(){
        console.log('asdasd');
        cambiar();
    });
    function cambiar(){
        var pdrs = document.getElementById('foto').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
</script>

@endsection
