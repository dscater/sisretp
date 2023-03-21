@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">

<style>
div.form-group.contenedor_subir{
    position: relative;
}

#foto{
max-width: 100%;
}

.subir{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
    position: absolute;
    top: 0;
    width: 100%
}

.subir span{
    margin-left: 5px;
}

.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #F44336;
}

.form-group.contenedor_foto{
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
                                <h4>Nuevo usuario</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="{{route('users.index')}}">Usuarios</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Nuevo usuario</span>
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
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Información</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad">
                                            {!! Form::open(['route'=>'users.store','method'=>'post','files'=>'true','id'=>'demo1-upload', 'class'=>'dropzone dropzone-custom needsclick add-professors']) !!}
                                                @include('admin.usuarios.forms.form')
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
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

<script>
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
</script>

@endsection
