@extends('layouts.admin')

@section('css')
<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/Lobibox.min.css')}}">
<link rel="stylesheet" href="{{asset('kiaalap-master/css/notifications/notifications.css')}}">

<style type="text/css">
.img_user{
    display: flex;
    justify-content: center;
    align-items: center;
}

.botones_config button{
    width: 48%;
}

.img_user img{
    width: 125px!important;
    height: 125px!important;
    margin:auto;
    border-radius: 50%;
}
#imagen{
    width: 120px;
    height: 140px;
}

.invalid-feedback{
    color:#F44336;
}

.archivos{
    position: relative;
}

.archivos input[type="file"]{
    position: absolute;
    top: 0;
    z-index: 100;
    position: absolute;
    opacity: 0;
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

.subir:hover span{
    cursor: pointer;
}
.subir:hover{
    cursor: pointer;
    color:#fff;
    background: #F44336;
}

#nombre_usu{
    padding: 5px;
    cursor: pointer;   
}
#nombre_usu:hover{
    background: #d8e7fe;
}

button.aceptar{
    margin-top: 5px;
    margin-left:auto;
    margin-right: auto;
    width: 275px;
}
button.cancelar{
    margin-top: 5px;
    margin-left:auto;
    margin-right: auto;
    width: 275px;
}
</style>
@endsection
@section('logo')
{{asset('imgs/empresa/'.$empresa->logo)}}
@endsection
@section('empresa_nom')
<h4>{{ $empresa->name }}</h4>
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
                                <h4>Configurar cuenta</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="{{route('home')}}">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Configurar cuenta</span>
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
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-img img_user">
                        <img src="{{asset('imgs/users/'.Auth::user()->foto)}}" alt="" id="imagen_p"/>
                    </div>
                    <div class="profile-details-hr">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! Form::open(['route'=>['users.config_update_foto',$user->id],'method'=>'POST','class'=>'form-horizontal','id'=>'form_foto']) !!}
                                <div class="col-md-12">
                                    <div class="form-line archivos">
                                        <label for="foto" class="subir">
                                            <span>Elegir foto</span>
                                            <span id="nom_img"></span>
                                        </label>
                                        <input type="file" name="foto" id="foto" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12 botones_config">
                                    <button type="button" class="btn btn-default" id="cancelar" style="display: none">Cancelar</button>
                                    <button class="btn btn-success" id="guardar_img" style="display: none">Guardar cambios</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="address-hr">
                                    <p><b>NOMBRE DE USUARIO: </b><br /> 

                                        <span id="nombre_usu" data-toggle="tooltip" title="Doble click para cambiar el nombre">
                                            {{Auth::user()->name}}
                                        </span><br>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                        {!! Form::open(['route'=>['users.config_nom',Auth::user()->id],'method'=>'put','id'=>'form_nombre','style'=>'display:none']) !!}
                                        <input type="text" value="{{Auth::user()->name}}" id="name" name="name"> <br>
                                        <button type="submit" class="btn btn-success aceptar">Aceptar</button>
                                        <button type="button" id="cancelar_env_nom" class="btn btn-default cancelar">Cancelar</button>
                                        {!! Form::close() !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="address-hr">
                                    <p><b>TIPO DE USUARIO</b><br /> {{Auth::user()->tipo}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#informacion"> Información</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="informacion">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="lead-head">
                                        <h3>CONFIGURAR CUENTA</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="coment-area">
                                                {!! Form::open(['route'=>['users.config_update',Auth::user()->id],'method'=>'put']) !!}
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-res-mg-bt">
                                                        <div class="form-group">
                                                            <label for="OldPassword" class="col-sm-3 control-label">Antigua contraseña</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="password" class="form-control" id="OldPassword" name="oldPassword" placeholder="Antigua contraseña" required>
                                                                    </div>
                                                                    @if(session('contra_error') && session('contra_error') == 'old_password') 
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>La contraseña no coincide.</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="NewPassword" class="col-sm-3 control-label">Nueva contraseña</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="password" class="form-control" id="NewPassword" name="newPassword" placeholder="Nueva contraseña" minlength="6" required>
                                                                    </div>
                                                                    @if(session('contra_error') && session('contra_error') == 'comfirm') 
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>Las contraseñas no coinciden. Intenten nuevamente.</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nueva contraseña (Confirmar)</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirm" placeholder="Nueva contraseña (Confirmar)" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-danger">GUARDAR</button>
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
</div>


@endsection

@section('scripts')
<!-- notification JS
============================================ -->
<script src="{{asset('kiaalap-master/js/notifications/Lobibox.js')}}"></script>
{{-- <script src="{{asset('js/notifications/notification-active.js')}}"></script> --}}
<script type="text/javascript">

        @if(session('datos'))
        Lobibox.notify('success', {
            position: 'top right',
            msg: 'CUENTA ACTUALIZADA CON ÉXITO.',
            title: 'ÉXITO!'
        });
        @endif

        @if(session('nombre'))
        Lobibox.notify('success', {
            position: 'top right',
            msg: 'NOMBRE ACTUALIZADO CON ÉXITO',
            title: 'ÉXITO!'
        });
        @endif

        @if(session('password'))
        Lobibox.notify('success', {
            position: 'top right',
            msg: 'CONTRASEÑA ACTUALIZADA CON ÉXITO',
            title: 'ÉXITO!'
        });
        @endif

        @if(session('contra_error'))
        Lobibox.notify('danger', {
            position: 'top right',
            msg: 'OCURRIÓ UN ERROR AL CONFIGURAR LA CONTRASEÑA.',
            title: 'ERROR!'
        });
        @endif

        //EDICION DE IMAGENES
        //Previsualizar la imagen seleccionada
        $('body').on('change','#foto',function(e){
            try{
                addImage(e);
            }
            catch(error){
                $('#nom_img').text(error);
                $('#cancelar').hide();
                $('#guardar_img').hide();
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
        $('#cancelar').show();
        $('#guardar_img').show();
        var result=e.target.result;
        $('#imagen_p').attr("src",result);
    }

    $('#cancelar').click(function(){
        location.reload();
    });

    $('#guardar_img').click(function(e){
        e.preventDefault();
        var formulario = $('#form_foto');
        var url = formulario.prop('action');
        console.log(url);
        var str = new FormData(formulario[0]);
        $.ajax({
            cache: false,
            processData: false, 
            contentType: false,
            url: url,
            headers:{'X-CSRF-TOKEN':$('#token').val()},
            type: 'POST',
            dataType: 'json',
            data: str
        })
        .done(function(resp) {
            console.log("success | "+resp.msg);
            Lobibox.notify('success', {
                position: 'top right',
                msg: 'FOTO DE PERFIL ACTUALIZADO CON ÉXITO',
                title: 'ÉXITO!'
            });
            $('#cancelar').hide();
            $('#guardar_img').hide();
            setTimeout(function(){
                location.reload();
            },2000)
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
        // for (var pair of str.entries()) {
        //             console.log(pair[0]+ ', ' + pair[1]); 
        // }
    });

    /***************************************
        CAMBIAR EL NOMBRE DE USUARIO
    ****************************************/
    $('#nombre_usu').dblclick(function(){
        $(this).hide();
        $('#name').val($(this).text().trim());
        $('#form_nombre').show();
    });

    $('#cancelar_env_nom').click(function(){
        $('#nombre_usu').show();
        $('#form_nombre').hide();
    });

</script>
@endsection