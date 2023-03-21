$(document).ready(function () {
    $('#carrera').change(function(){
        filtro();
    });
    paginar();
});

function filtro()
{
    let carrera = $('#carrera').val();
    let url = $('#url_paginacion').val();
    $.ajax({
        type: "get",
        url: url,
        data: {carrera:carrera},
        dataType: "json",
        success: function (response) {
            $('#lista').html(response.lista);
        }
    });
}

function paginar()
{
    $(document).on('click','.custom-pagination .pagination li a.page-link',function(e){
        e.preventDefault();
        
        var url = $('#url_paginacion').val();
        let carrera = $('#carrera').val();

        var page = $(this).attr('href').split('page=')[1];
        $.ajax({
            url:url,
            data:{'page':page,'carrera':carrera},
            type:'get',
            dataType:'json',
            success:function(response){
                $('#lista').html(response.lista);
            }
        });
    });
}