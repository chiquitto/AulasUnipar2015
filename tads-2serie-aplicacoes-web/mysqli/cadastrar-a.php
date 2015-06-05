<?php

$nome = '';
$email = '';
$ativo = '1';

if ($_POST) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	if (!isset($_POST['ativo'])) {
		$ativo = '0';
	}

	$sql = "Insert Into cliente
	(nome, email, status) values
	('$nome', '$email', '$ativo')";

	require 'conexao.php';
	$r = mysqli_query($con, $sql);

	if ($r == false) {
		echo "Falha SQL: " . mysqli_error($con);
		echo $sql;
		exit;
	}

	echo "Registro cadastrado!";
	exit;
}

?>
<html>
<head>
  <title>Cadastrar Cliente</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Cadastrar cliente</h1>

	<form name="form1" action="cadastrar.php" method="post">

		<p>
	    Nome completo:
	    <input type="text" name="nome" value="<?php echo $nome; ?>">
		</p>

		<p>
			Email:
			<input type="email" name="email" value="<?php echo $email; ?>">
		</p>

		<p>
			<input type="checkbox" name="ativo"
			value="1"<?php if ($ativo == '1') { ?> checked<?php } ?>>
			Ativo
		</p>

		<input type="submit" name="botao" value="Salvar">

	</form>

</body>
</html>

