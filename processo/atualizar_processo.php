<?php

include '../conexao.php';
	$id = $_POST['id'];
	$Numero = $_POST['Numero'];
	$Descricao = $_POST['Descricao'];
	$Forum = $_POST['Forum'];
	$Situacao = $_POST['Situacao'];
	
		$sql = "UPDATE `processo` SET `Numero`= $Numero ,`Descricao`= '$Descricao',`Forum`= '$Forum',`Situacao`= '$Situacao' WHERE ProcessoID = $id";
		$atualizar = mysqli_query($conexao, $sql);
		

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
		if(mysqli_insert_id($conexao)){
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Atualizado com sucesso! </div>';
			header("Location: listar_processo.php");
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao Atualizar </div>';
			header("Location: listar_processo.php");
		}


?>
