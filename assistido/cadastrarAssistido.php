<!--PAGINA CADASTRAR -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulário de Cadastro</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->

</head>
<body>
  	
	<div class="container" id="tamanhoContainer">

		<a href="listar_assistido.php" id="novo"><i class="fas fa-angle-double-left"></i></a>
		<h4>Formulário de Cadastro de assistido</h4>
		
		<?php
		  session_start();
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="inserir_assistido.php" method="post" style="margin-top: 20px">
	 		
			<div class="row">
				<div class="col-sm-6">
	    			<label>CPF</label>
	    			<input type="text" class="form-control" min="0" maxlength="11" minlegth="11" name="CPF" placeholder="Número CPF" required>
  				</div>
  			</div>

  			<div class="form-group">
	    		<label>Nome Completo</label>
	    		<input type="text" class="form-control" name="NomeCompleto"  placeholder="Insira o Nome Completo" required>
  			</div>

		  	<div class="form-group">
			    <label>Endereço</label>
			    <input type="text" class="form-control" name="Endereco" placeholder="Insira o Endereço" required>
		  	</div>

		  	<div class="row">
				<div class="col-md-6">
			    <label>Data Nascimento</label>
			    <input type="date" class="form-control" name="DataNascimento" placeholder="Insira a Data Nascimento" required >
			</div>
			<div class="col-md-6">
			    <label>Tel </label>
				<small>Só números com DDD</small>
			    <input type="number" class="form-control"  min="0" maxlength="9" minlegth="9"  placeholder="Insira o Telefone" required>
		  	</div>

			<div id="botao">
				<button type="submit" class="btn btn-success " >Salvar</button>
			</div>

		</form>	

	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>

