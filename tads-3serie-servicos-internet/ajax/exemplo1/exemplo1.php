<!DOCTYPE html>
<html>

  <head>
    <title>Exemplo Ajax</title>
    <meta charset="utf-8">

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

  </head>

  <body>
  	
    <form id="frmVenda" action="" method="post">
      <p>
        Selecione um produto:
        <select name="idproduto" id="fidproduto"></select>
      </p>

      <fieldset>
        <legend>Detalhes do produto</legend>
        <p>
          Produto:
          <input type="text" name="produto" id="fproduto" readonly>
        </p>

        <p>
          Preço:
          <input type="text" name="preco" id="fpreco" readonly>
        </p>

        <p>
          Saldo:
          <input type="text" name="saldo" id="fsaldo" readonly>
        </p>
      </fieldset>

      <p>
        Adicionar na venda:
        <input type="number" name="qtd" id="fqtd">
      </p>

      <p>
        <input type="submit" name="submit" value="Adicionar">
      </p>
    </form>

  </body>
</html>