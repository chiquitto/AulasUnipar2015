window.onload = function () {
	var form = document.getElementById('fform');
	form.onsubmit = dispararFormulario;
}

function dispararFormulario(evento) {
	//window.alert('Oi');
	//console.log(evento);
	
	var fnome = document.getElementById('fnome');
	//window.alert(fnome.value);
	
	if (fnome.value == '') {
		//window.alert('Informe o seu nome');
		//evento.preventDefault();
		//return ;
	}
	
	var femail = document.getElementById('femail');
	var emailValor = femail.value;
	if (emailValor.indexOf('@') <= 0) {
		//window.alert('Informe seu email');
		//evento.preventDefault();
		//return;
	}
	
	// Validar se ultimo caractere == @
	
	// Maneira 1
	var comp = emailValor.length;
	var u = emailValor[comp-1];
	//console.log(u);
	
	// Maneira 2
	u = emailValor.substring(comp-1, comp);
	// console.log(u);
	
	// Maneira 3
	u = emailValor.substr(-1,3);
	console.log(u);
	
	evento.preventDefault();
}









