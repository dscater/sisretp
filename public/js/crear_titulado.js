let sw_envia = true;
let errores = [];
$(document).ready(function () {
});

function crear() {
    var form = $('#demo1-upload');
    var str = new FormData(form[0]);
    var url = form.attr('action');
    // for (var pair of str.entries()) {
    //                 console.log(pair[0]+ ', ' + pair[1]); 
    //             }
    console.log(url);
    console.log('SUBIENDO...');

    // agregar titulos
    let h_titulos = $("#contenedor_titulos").find('input[name="input_titulo[]"]');
    h_titulos.each(function (index) {
        if ($(this).get(0).files[0]) {
            str.append("titulo" + index, $(this).get(0).files[0]);
        } else {
            str.append("titulo" + index, "");
        }
    });

    // agregar diplomas
    let h_diplomas = $("#contenedor_postgrados").find('input[name="input_diploma[]"]');
    console.log(h_diplomas.length);
    h_diplomas.each(function (index) {
        if ($(this).get(0).files[0]) {
            str.append("diploma" + index, $(this).get(0).files[0]);
        } else {
            str.append("diploma" + index, "");
        }
    });

    if (sw_envia) {
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
                window.location.href = $('#url_home').val() + "?sw=inicio";
            }
        });
    }
}

function actualizar() {
    var form = $('#demo1-upload');
    var str = new FormData(form[0]);
    var url = form.attr('action');
    // for (var pair of str.entries()) {
    //                 console.log(pair[0]+ ', ' + pair[1]); 
    //             }

    // agregar titulos
    let h_titulos = $("#contenedor_titulos").find('input[name="input_titulo[]"]');
    h_titulos.each(function (index) {
        if ($(this).get(0).files[0]) {
            str.append("titulo" + index, $(this).get(0).files[0]);
        } else {
            str.append("titulo" + index, "");
        }
    });

    // agregar diplomas
    let h_diplomas = $("#contenedor_postgrados").find('input[name="input_diploma[]"]');
    console.log(h_diplomas.length);
    h_diplomas.each(function (index) {
        if ($(this).get(0).files[0]) {
            str.append("diploma" + index, $(this).get(0).files[0]);
        } else {
            str.append("diploma" + index, "");
        }
    });

    if (sw_envia) {
        $.ajax({
            cache: false,
            processData: false,
            contentType: false,
            type: "post",
            url: url,
            data: str,
            dataType: "json",
            success: function (response) {
                console.log(response);
                window.location.href = $('#url_edit').val() + "?sw=update";
            }
        });
    } else {
    }

}
