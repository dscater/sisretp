$(document).ready(function () {
    // $('#num_mensajes').hide();
    cargarMensajes();
    setInterval(cargarMensajes,1000);
});

function cargarMensajes()
{
    let url = $('#url_mensajes').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: "json",
        success: function (response) {
            var li = ``;        
            let lista_mensajes = $('#lista_mensajes');    
            let url_imgs = $('#url_imgs').val();
            // console.log(response.mensajes);
            response.mensajes.forEach(function(elem){
                li += `<li>
                            <a href="${$('#url_base').val()}/mensajes/show/${elem.id}">
                                <div class="message-img">
                                    <img src="${url_imgs}/users/${elem.foto}" alt="">
                                </div>
                                <div class="message-content">
                                    <h2>${elem.nombre}</h2>
                                    <p class="razon">${elem.razon}</p>
                                    <p>${elem.mensaje}</p>
                                    <span class="message-date">${elem.fecha}</span>
                                </div>
                            </a>
                        </li>`;
            });
            lista_mensajes.html(li);
            if(response.no_leidos > 0)
            {
                $('#num_mensajes').show();
                $('#num_mensajes').children('span.numero_msjs').text(response.no_leidos);
            }
            else{
                $('#num_mensajes').hide();
            }
        }
    });
}