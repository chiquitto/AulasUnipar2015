window.onload = iniciar;

function iniciar() {
	document.getElementById('ftipoF').onclick = manipularRadios;
	
	document.getElementById('ftipoJ').onclick = manipularRadios;
}

function manipularRadios(evento) {
	if (evento.target.value == 'F') {
		mostrarFormF();
	}
	else {
		mostrarFormJ();
	}
}

/*#pessoaF,#pessoaJ,#pessoaFJ {
  max-height: 0;
  overflow: hidden;
  transition: all 1s ease;
}*/

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





