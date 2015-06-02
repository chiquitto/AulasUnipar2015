<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Cliente</title>
  <meta charset="utf-8">
</head>
<body>

	<h1>Cadastrar cliente</h1>

	<form name="form1" action="cadastrar.php">

		<p>
	    Nome completo:
	    <input type="text" name="nome" value="">
		</p>

		<p>
			Email:
			<input type="email" name="email">
		</p>

		<p>
			<input type="checkbox" name="ativo"
			value="1" checked>
			Ativo
		</p>

		<input type="submit" name="botao" value="Salvar">

	</form>

</body>
</html>

