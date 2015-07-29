$(document).ready(function(){
	window.alert('Iniciar');

	carregarProdutos();

	$('#frmVenda').submit(adicionarProduto);
});

function carregarProdutos() {

}

function adicionarProduto(e) {
	e.preventDefault();

	window.alert('Adicionar Produto');
}