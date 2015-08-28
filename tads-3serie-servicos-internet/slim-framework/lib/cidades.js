$(document).ready(init);

function init() {
	//window.alert('Oi');
	carregarUF();
	$('#frm1').submit(frm1Submit);
}

function frm1Submit(evento){
	evento.preventDefault();
	var idcidade = $('#fidcidade').val();
	var populacao = $('#fpopulacao').val();

	$.ajax({
		type: 'POST',
		url: './api/editarCidade',
		data: {idcidade : idcidade, populacao : populacao},
		dataType: 'json',
		success: function (){
			window.alert('Informações salvas!');
		}
	});
}

function exibirLoading(){
	$('#loading').show();
}

function esconderLoading(){
	$('#loading').hide();
}

function carregarUF(){
	exibirLoading();
	$.ajax({
		type:'GET',
		url: './api/estado',
		data:{},
		dataType: 'json',
		success: carregarUFOK,
	});
}

function carregarUFOK(dados){
	var html = '';
	var template = '<option value="{id}">{texto}</option>';
	var ultimo = dados.dados.length;

	html += template.replace('{id}', 0)
									.replace('{texto}', 'Selecione um estado');

	for(var i = 0; i < ultimo; i++){
		var estado = dados.dados[i];

		html += template.replace('{id}', estado.iduf)
										.replace('{texto}', estado.uf);
	}
	$('#fiduf').html(html);
	$('#fiduf').change(carregarCidades);
	esconderLoading();
}

function carregarCidades(){
	var ufSelecionada = $('#fiduf').val();
	exibirLoading();
	$.ajax({
		type: 'GET',
		url: './api/estado/cidade/'+ ufSelecionada,
		data: {},
		dataType: 'json',
		success: carregarCidadesOK,

	});
}

function carregarCidadesOK(dados){
	var html = '';
	var template = '<option value="{idcidade}">{cidade}</option>';
	var ultimo = dados.dados.length;
	html += template.replace('{idcidade}', 0)
									.replace('{cidade}', 'Selecione uma cidade');
	for (var i = 0; i < ultimo; i++){
		var cidade = dados.dados[i];
		html += template.replace("{idcidade}", cidade.idcidade)
		.replace("{cidade}", cidade.cidade);
	}
	$('#fidcidade').html(html);
	$('#fidcidade')
		.unbind('change')
		.change(carregarPopulacao);
	esconderLoading();
}

function carregarPopulacao() {
	//window.alert('Populacao');
	exibirLoading();
	var cidadeSelecionada = $('#fidcidade').val();
	$.ajax({
		type: 'GET',
		url: './api/cidade/' +cidadeSelecionada,
		data: {},
		dataType: 'json',
		success: carregarPopulacaoOK,
	});
}

function carregarPopulacaoOK(dados){
	//console.log(dados.dados);
	var cidade = dados.dados;
	$('#fpopulacao').val(cidade.populacao);
	esconderLoading();
}











//
