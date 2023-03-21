$(document).ready(function () {
});

function crear(){
    var form = $('#demo1-upload');
    var str = new FormData(form[0]);
    var url = form.attr('action');
    // for (var pair of str.entries()) {
    //                 console.log(pair[0]+ ', ' + pair[1]); 
    //             }
    console.log(url);
    console.log('SUBIENDO...');
    $.ajax({
        cache: false,
        processData: false, 
        contentType: false,
        type: "post",
        url: url,
        data: str,
        dataType: "json",
        success: function (response) {
            console.log(response.msg);
            window.location.href = $('#url_home').val()+"?sw=inicio";
        }
    });
}

function actualizar(){
    var form = $('#demo1-upload');
    var str = new FormData(form[0]);
    var url = form.attr('action');
    // for (var pair of str.entries()) {
    //                 console.log(pair[0]+ ', ' + pair[1]); 
    //             }
    console.log(url);
    console.log('ACTUALIZANDO...');
    $.ajax({
        cache: false,
        processData: false, 
        contentType: false,
        type: "post",
        url: url,
        data: str,
        dataType: "json",
        success: function (response) {
            console.log(response.msg);
            window.location.href = $('#url_edit').val()+"?sw=update";
        }
    });
}