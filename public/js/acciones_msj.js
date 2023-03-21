$(document).ready(function () {
    console.log('listo para acciones');
    paginar();
    buscar();

    $(document).on('click','#btn_eliminar',function(){
        let contenedor_msj = $('#contenedor_msj');
        let filas = contenedor_msj.children('tr');
        let c = 0;
        filas.each(function(){
            let td1 = $(this).children('td').eq(0);
            let checkbox = td1.children('input.checkbox');
            if(checkbox.prop('checked'))
            c++;
        });
        if(c > 0)
        {
            $('#texto_eliminar').text(`Eliminaras ${c} registro(s). ¿Estás seguro(a)?`);
            $('#eliminar').modal('show');
            recorrer_filas();
        }
        else{
            Lobibox.notify('info', {
                position: 'bottom right',
                msg: 'Debes seleccionar al menos una fila.',
                title: 'Atención'
            });
        }
    });

    $(document).on('click','#btn_actualizar',function(){
        listar();
    });
});

function recorrer_filas()
{
    let contenedor_msj = $('#contenedor_msj');
    let filas = contenedor_msj.children('tr');
    filas.each(function(){
        let td1 = $(this).children('td').eq(0);
        let url_eliminar = td1.children('input.eliminar').val();
        let checkbox = td1.children('input.checkbox');
        console.log(url_eliminar);
        if(checkbox.prop('checked'))
        {
            eliminar(url_eliminar);
        }
    });
    Lobibox.notify('success', {
        position: 'top right',
        msg: 'Eliminación éxitosa.',
        title: 'Éxito'
    });
}

function eliminar(url)
{
    let token = $('#token').val();
    console.log(token);
    $.ajax({
        type: "delete",
        headers:{'X-CSRF-TOKEN':token},
        url: url,
        data:{data:'data'},
        dataType: "json",
        beforesend:function(){
            $('.breadcome-area').append(`<span>Eliminando...</span>`);
        },
        success: function (response) {
            listar();
        }
    });
}

function buscar(){
    $(document).on('keyup','#texto',function(e){
        e.preventDefault();
        let url_paginacion = $('#url_paginacion').val();
        let texto = $(this).val();
        $.ajax({
            type: "get",
            url: url_paginacion,
            data: {'texto':texto},
            dataType: "json",
            success: function (response) {
                $('#lista_msj').html(response.lista);
            }
        }).fail(function(){
            console.log('Error');
        });
    });
}

function paginar()
{
    $(document).on('click','.custom-pagination ul.pagination li.page-item a.page-link',function(e){
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        let texto = $('#texto').val();
        let url_paginacion = $('#url_paginacion').val();
        $.ajax({
            type: "get",
            url: url_paginacion,
            data: {'page':page,'texto':texto},
            dataType: "json",
            success: function (response) {
                $('#lista_msj').html(response.lista);
            }
        }).fail(function(){
            console.log('Error');
        });
    });
}

function listar()
{
    let url_paginacion = $('#url_paginacion').val();
    let texto = $('#texto').val();
    $.ajax({
    type: "get",
    url: url_paginacion,
    data: {'texto':texto},
    dataType: "json",
    success: function (response) {
        $('#lista_msj').html(response.lista);
    }
    }).fail(function(){
        console.log('Error');
    });
}