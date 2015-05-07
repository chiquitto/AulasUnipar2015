<div class="container">
  <div class="row">
  	<div class="col-lg-4"></div>
  	<div class="col-lg-4"></div>
  	<div class="col-lg-4"></div>
  </div>
  <div class="row">
  	<div class="col-lg-6"></div>
  	<div class="col-lg-6"></div>
  </div>
</div>

<form>
	<div class="container">
	  <div class="row">
	    <div class="col-xs-4">
	    	<div class="form-group">
	    		<label class="control-label">Referencia</label>
	    		<input type="text" class="form-control">
	    	</div>
	    </div>
	    <div class="col-xs-8">
	    	<div class="form-group">
	    		<label class="control-label">Descricao</label>
	    		<input type="text" class="form-control">
	    	</div>
	    </div>
	  </div>
	</div>
</form>

<input type="submit" class="btn btn-primary">

<?php

$times = array();
$times[] = array(
	'id' => 15,
	'nome' => 'Flamengo',
	'cidade' => 'Rio de Janeiro',
);
$times[] = array(
  'id' => 25,
  'nome' => 'Palmeiras',
  'cidade' => 'São Paulo'
);

?>