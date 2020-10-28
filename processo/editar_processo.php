<?php

include '../conexao.php';

$id= $_GET['id'];
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Processo</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	
</head>
<body>

	<div class="container" id="tamanhoContainer">
		<a href="listar_processo.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Editar Processo</h4>

		<form action="atualizar_processo.php" method="post" style="margin-top: 20px">
			<?php

			$sql = "SELECT * FROM `processo` WHERE ProcessoID = $id";
			$buscar = mysqli_query($conexao, $sql);

			while ($array = mysqli_fetch_array($buscar)) {
				$id = $array['ProcessoID'];
				$Numero = $array['Numero'];
		    	$Descricao = $array['Descricao'];
		    	$Forum = $array['Forum'];
		    	$DataEntrada = $array['DataEntrada'];
				$Situacao = $array['Situacao'];
			?>
			<div class="row">
				<div class="col-sm-6">
					<label>Numero</label>
		    		<input type="number" class="form-control" name="Numero" value="<?php echo $Numero ?>" require>
		    		<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;" >
		    	</div>
	    	</div>

	 		<div class="form-group">
	    		<label>Descrição</label>
	    		<input type="text" class="form-control" name="Descricao" value="<?php echo $Descricao ?>" require>	
  			</div>

				<div class="row">
					<div class="col-sm-6">
	    				<label>Fórum</label>
	    				<input type="text" class="form-control" name="Forum" value="<?php echo $Forum ?>" required>
	    			</div>

	    			<div class="col-sm-6">
	    				<label>Data Entrada</label>
	    				<input type="date" class="form-control" name="DataEntrada"  value="<?php echo $DataEntrada ?>"  disabled>
  					</div>
  				</div>

				<div class="col-sm-6" style="margin-left: -15px; margin-top: 10px;">
				  	<label>Situação</label>
					  <input type="text" class="form-control" name="Situacao" placeholder="Situação" required>
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

