$(document).ready(init);

function init() {
	//window.alert('Oi');
	//exibirLoading();
	carregarUF();
	$('#frm1').submit(frm1Submit);
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
		type: 'GET',
		url: './api/estado',
		data: {},
		success: carregarUFOK,
		dataType: 'json',
	});
}

function carregarUFOK(dados){
	//console.log(dados.dados);

	var template = '<option value="{id}">{texto}</option>';
	var html = '';
	var ultimo = dados.dados.length;

	for(var i=0; i<ultimo; i++){
		var uf = dados.dados[i];
		html += template.replace('{id}', uf.iduf)
										.replace('{texto}', uf.uf);
	}
	$('#fiduf').html(html);
	esconderLoading();
}

function frm1Submit(evento){
	evento.preventDefault();
	var iduf = $('#fiduf').val();
	var cidade = $('#fcidade').val();
	var populacao = $('#fpopulacao').val();

	$.ajax({
		type: 'POST',
		url: './api/cidade',
		data: {
			cidade: cidade,
			populacao: populacao,
			uf: iduf,
		},
		dataType: 'json',
		success: frm1SubmitOK,
	});
}

function frm1SubmitOK(dados){
	window.alert('OK');
}









//
