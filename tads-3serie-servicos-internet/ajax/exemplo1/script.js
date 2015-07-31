//window.onload = function() {}

$(document).ready(function(){
	//window.alert('Iniciar');

	carregarProdutos();

	$('#frmVenda').submit(adicionarProduto);
});

function carregarProdutos() {
	$.ajax({
	  type: "GET",
	  url: 'produtos.php',
	  data: {},
	  success: carregarProdutosOk,
	  dataType: 'json',
	  //error: falha
	});

	// Mostrar carregando
}

function carregarProdutosOk(dados) {
	//window.alert(dados[0].descricao);

	var html = '';
	var i;
	for (i = 0; i < dados.length; i++) {
		html += '<option value="'
		+ dados[i].id
		+ '">'
		+ dados[i].descricao
		+ '</option>';
	}

	//document.getElementById("fidproduto").innerHTML = html;
	$('#fidproduto').html(html);

	// Esconder carregando
}

function adicionarProduto(e) {
	e.preventDefault();

	window.alert('Adicionar Produto');
}