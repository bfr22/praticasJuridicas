<!--TELA DE CONSULTA-->
<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Práticas jurídicas</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"><!--FILTROS-->
	
</head>
<body>

	<div class="container" id="listaContainer">
		<a href="../index.php" ><i class="fas fa-angle-double-left"></i></a>
		<h3 id="content">Lista de Processos</h3><br>
		<?php

			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<!--NOVO-->
		<div clas="col-md-12">
			<div class="col-md-2">
			<a class="font-weight-bold" href="cadastrarProcesso.php"><i class="fas fa-plus"> Novo</i></a>
			</div>
		</div>

		<div class="table-responsive">
		<table class="table table-sm" id="minhaTabela" >
		  <thead>
		    <tr>
		      <th scope="col">Número</th>
		      <th scope="col">Descrição</th>
		      <th scope="col">Fórum</th>
		      <th scope="col">Data entrada</th>
			  <th scope="col"></th>
		    </tr>
		  </thead>
		    
		    	<?php

		    		include '../conexao.php';
		    		$sql = "SELECT * FROM `processo` WHERE `Ativo` = 1 ";
		    		$buscar = mysqli_query($conexao, $sql);

		    		while ($array = mysqli_fetch_array($buscar)){
						$id = $array['ProcessoID'];
		    			$Numero = $array['Numero'];
		    			$Descricao = $array['Descricao'];
		    			$Forum = $array['Forum'];
		    			$DataEntrada = $array['DataEntrada'];
		    			$Situacao = $array['Situacao'];
		    	?>
		    <tr>	
		      <td><?php echo $Numero ?></td>
		      <td><?php echo $Descricao ?></td>
		      <td><?php echo $Forum ?></td>
		      <td><?php echo date('d/m/Y', strtotime($DataEntrada)); ?></td>
			  <td>
			  	<a class="btn btn-warning btn-sm"  style="color: #fff" href="editar_processo.php?id=<?php echo $id ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a> <!--&nbsp:  espaço/ tag php ai dentro: passa id pelo link-->

			  	<a class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir ?')" style="color: #fff" href="deletar_processo.php?id=<?php echo $id ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>

			  </td>
			 </tr>

		  <?php } ?> <!--fim while-->
		  
		</table>
	</div>


	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  	<!--SCRIPT DE FILTROS-->
  	<script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
</body>
</html>