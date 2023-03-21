<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="form-group">
            <label>Nombre*</label>
            {{Form::text('nom',null,['class'=>'form-control','placeholder'=>'Nombre*','required'])}}
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="form-group">
            <label>Descripción</label>
            {{Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción'])}}
        </div>
    </div>
</div>