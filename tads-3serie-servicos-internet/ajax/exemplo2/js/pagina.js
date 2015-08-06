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
    botaoRepositorios();
    $('#frm2').show();
}

function botaoRepositorios() {
    $('.verRepositorios').click(verRepositoriosClick);

}

function verRepositoriosClick(e){
    e.preventDefault();

    var user = $(this).data('user');

    var url = 'https://api.github.com/users/'
               + user 
               + '/repos';

    $.ajax({
        url:url,
        success: verRepositoriosOK,
        dataType: 'json',
        type: 'GET',
        data: {}
    });

}

function verRepositoriosOK(dados){
    //id, name, html_url, description

    var i;
    var modelo = '<tr>'
                +'<td>{id}</td>'
                +'<td>{nome}</td>'
                +'<td>{descricao}</td>'
                +'<td><a target="_blank" class="btn btn-xs btn-primary" href="{url}"><span class="glyphicon glyphicon-search"></span></a></td>'
                +'<tr>';

    var html = '';

    for(i=0; i<dados.length; i++){
        var repositorio = dados[i];
        html += modelo

            .replace('{id}', repositorio.id)
            .replace('{nome}', repositorio.name)
            .replace('{descricao}', repositorio.description)
            .replace('{url}', repositorio.html_url);

    }

    $('#frm3 tbody').html(html);
    $('#frm3').show();
}