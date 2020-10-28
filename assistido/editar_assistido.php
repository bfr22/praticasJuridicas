<?php

include '../conexao.php';

$id= $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de assistido</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	
</head>
<body>

	<div class="container" id="tamanhoContainer">
		<a href="listar_assistido.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Editar assistido</h4>

		<form action="atualizar_assistido.php" method="post" style="margin-top: 20px">
			<?php

			$sql = "SELECT * FROM `assistido` WHERE assistidoID = $id";
			$buscar = mysqli_query($conexao, $sql);

			while ($array = mysqli_fetch_array($buscar)) {
				
				$CPF = $array['CPF'];
		    	$NomeCompleto = $array['NomeCompleto'];
		    	$Telefone = $array['Telefone'];
		    	$Endereco = $array['Endereco'];
				$DataNascimento = $array['DataNascimento'];
			?>
			<div class="row">
				<div class="col-sm-6">
					<label>CPF</label>
		    		<input type="text" class="form-control" name="CPF" value="<?php echo $CPF ?>" required>
		    		<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;" >
		    	</div>
	    	</div>

	 		<div class="form-group">
	    		<label>Nome Completo</label>
	    		<input type="text" class="form-control" name="NomeCompleto" value="<?php echo $NomeCompleto ?>" required>	
  			</div>

			<div class="form-group">
	    		<label>Endereço</label>
	    		<input type="text" class="form-control" name="Endereco" value="<?php echo $Endereco ?>" required>	
  			</div>

				<div class="row">
					<div class="col-sm-6">
	    				<label>Data Nascimento</label>
	    				<input type="date" class="form-control" name="DataNascimento" value="<?php echo $DataNascimento ?>" required>
	    			</div>

	    			<div class="col-sm-6">
	    				<label>Telefone</label>
	    				<input type="text" class="form-control" name="Telefone"  value="<?php echo $Telefone ?>"  required>
  					</div>
  				</div>
		  		
			<div id="botao">
				<button type="submit" class="btn btn-success " >Atualizar</button>
			</div>
			
		<?php } ?> <!--fim while-->
		</form>	

	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

