<!DOCTYPE html>
<html>
<head>
  <title>Tela de login</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Informações do formulário</h1>

	<?php //print_r($_POST); ?>

	<p>Email: <?php echo $_POST['email']; ?></p>

	<?php
	if ($_POST['senha'] != '') {
		$senha = $_POST['senha'];
	}
	else {
		$senha = 'Vazio';
	}
	?>
	<p>Senha: <?php echo $senha; ?></p>

	<?php
	if ( isset($_POST['logado']) ) {
		$logado = 'Sim';
	}
	else {
		$logado = 'Não';
	}
	?>
	<p>Permanecer logado: <?php echo $logado; ?>
	</p>

</body>
</html>