$(document).ready(function () {
    paginar();
    ennumerar(1,15);
    buscar();
});


function buscar()
{
    $(document).on('keyup','#buscar',function(e){
        e.preventDefault();
        
        var url = $('#url_paginacion').val();
        
        var texto = $(this).val();
        $.ajax({
            url:url,
            data:{'texto':texto},
            type:'get',
            dataType:'json',
            before:function(){
                $('.asset-inner').html('<strong>Cargando...</strong>');
            },
            success:function(data){
                $('.asset-inner').html(data.lista);
                ennumerar(1,data.paginacion);
            }
        });
    });
}

function paginar()
{
    $(document).on('click','.custom-pagination .pagination li a.page-link',function(e){
        e.preventDefault();
        
        var url = $('#url_paginacion').val();
        var texto = $('#buscar').val(); 

        var page = $(this).attr('href').split('page=')[1];
        $.ajax({
            url:url,
            data:{'page':page,'texto':texto},
            type:'get',
            dataType:'json',
            success:function(data){
                $('.asset-inner').html(data.lista);
                ennumerar(data.pagina,data.paginacion);
            }
        });
    });
}

function ennumerar(pagina,paginacion)
{
    let cont = 1;
    $('.asset-inner table tr.fila').each(function(){
    if(pagina > 1)
        {
            cont = pagina * paginacion;
        }
        $(this).children('td').eq(0).text(cont);
        cont = cont + 1;
    });
}