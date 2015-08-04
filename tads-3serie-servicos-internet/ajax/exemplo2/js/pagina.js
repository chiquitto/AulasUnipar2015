$(document).ready(iniciar);

function iniciar() {
    // document.getElementById('frm2').style.display = 'none';
    $('#frm2,#frm3').hide();

    $('#frm1').submit(frm1Submit);
}

function frm1Submit(e) {
    e.preventDefault();

    var q = $('#frm1q').val();

    $.ajax({
        type: "GET",
        //url: 'https://api.github.com/search/users',
        url: 'offline/users-chiqui.php',
        data: {q:q},
        success: frm1SubmitOk,
        dataType: 'json',
        //error: falha
    });
}

function frm1SubmitOk(dados) {
    console.log(dados);
    
    var modelo = '<div class="media">'
    + '<div class="media-left">'
    + '<img class="media-object img-rounded" src="{foto}" alt="{nome}">'
    + '</div>'
    + '<div class="media-body">'
    + '<h4 class="media-heading">{nome}</h4>'
    + '<a class="btn btn-primary verRepositorios" data-user="{user}">Repositórios</a>'
    + '</div>'
    + '</div>';
    
    var usuarios = dados.items;
    var i;
    var html = '';
    
    for (i = 0; i < usuarios.length; i++) {
        var usuario = usuarios[i];
        
        html += modelo
                .replace('{foto}', usuario.avatar_url)
                .replace('{nome}', usuario.login)
                .replace('{nome}', usuario.login)
                .replace('{user}', usuario.login)
        ;
    }
    
    $('#frm2 .panel-body').html(html);
    $('#frm2').show();
}