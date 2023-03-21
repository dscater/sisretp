$(document).ready(function () {
    titulados();
});

function titulados()
{
    // var fecha_ini = $('#modal_titulados #fecha_ini').parents('.form-group');
    // var fecha_fin = $('#modal_titulados #fecha_fin').parents('.form-group');
    var select1 = $('#modal_titulados #carrera').parents('.form-group');

    select1.hide();
    $('#modal_titulados select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
            break;
            case 'CARRERA':
                select1.show();
            break;
        }
    });
}