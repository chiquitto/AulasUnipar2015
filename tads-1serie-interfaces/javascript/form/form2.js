window.onload = iniciar;

function iniciar(evento) {
	document.getElementById('ftipoF').onclick = manipularRadio;
	document.getElementById('ftipoJ').onclick = manipularRadio;
	document.getElementById('fform').onsubmit = manipularSubmit;
}

function manipularRadio(evento) {
	//console.log(evento.target.value);
	if (evento.target.value == 'F') {
		mostrarFormF();
	}
	else {
		mostrarFormJ();
	}
}

function mostrarFormF() {
	document.getElementById('pessoaF').style.maxHeight = '1000px';
	document.getElementById('pessoaJ').style.maxHeight = '0';
	document.getElementById('pessoaFJ').style.maxHeight = '1000px';
}

function mostrarFormJ() {
	document.getElementById('pessoaF').style.maxHeight = '0';
	document.getElementById('pessoaJ').style.maxHeight = '1000px';
	document.getElementById('pessoaFJ').style.maxHeight = '1000px';
	
}

function manipularSubmit(evento) {
	var ok = true;

	var ftipoF = document.getElementById('ftipoF');
	if (ftipoF.checked) {
		ok = manipularSubmitF();
	}
	else {
		ok = manipularSubmitJ();
	}
	
	if (ok == true){
		ok = manipularSubmitFJ();
	}
	
	if (ok == false) {
		evento.preventDefault();
		return ;
	}
	
}

function manipularSubmitF() {
	var nome = document.getElementById('fnome');
	if (nome.value == '') {
		window.alert('Nome deve ser preenchido');
		return false;
	}
	
	var cpf = document.getElementById ('cpf');
	if (cpf.value == ''){
		window.alert ('CPF deve ser preenchido');
		return false;
	}
	else if (TestaCPF(cpf.value) == false) {
		window.alert('O CPF informado é invalido');
		//cpf.focus();
		cpf.select();
		return false;
	}
	return true;
}

function manipularSubmitJ() {
	var frsocial = document.getElementById('frsocial');
	if(frsocial.value == ''){
		window.alert('Razão Social deve ser preenchida.');
		return false;		
	}
	var fnomefantasia = document.getElementById('fnomefantasia');
	if(fnomefantasia.value == ''){
		window.alert('Nome Fantasia deve ser preenchido.');
		return false;
	}
	var cnpj = document.getElementById('cnpj');
	if(cnpj.value == ''){
		window.alert('Campo CNPJ é Obrigatório.');
		return false;
	} else if(ValidarCNPJ(cnpj.value) == false){
		window.alert('CNPJ incorreto.');
		return false;
	}
	return true;
}

function manipularSubmitFJ() {
	var femail = document.getElementById('femail');
	if(femail.value == ''){
		window.alert('Campo Email deve ser preenchido.');
		return false;
	}
	var femail2 = document.getElementById('femail2');
	if(femail.value != femail2.value){
		window.alert('Os campos de email devem ser iguais.');
		return false;
	}
	var fsenha = document.getElementById('fsenha');
	if(fsenha.value == ''){
		window.alert('Campo Senha não pode ser Vazio.');
		return false;
	}
	var fsenha2 = document.getElementById('fsenha2');
	if(fsenha.value != fsenha2.value){
		window.alert('Os campos senha devem ser iguais.');
		return false;
	}
	return true;
}












