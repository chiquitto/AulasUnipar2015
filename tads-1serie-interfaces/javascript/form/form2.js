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
		ok = false;
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
}

function manipularSubmitJ() {
}

function manipularSubmitFJ() {
}












