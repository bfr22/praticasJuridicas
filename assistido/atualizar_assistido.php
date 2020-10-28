<?php

include '../conexao.php';
	$id = $_POST['id'];
	$CPF = $_POST['CPF'];
	$NomeCompleto = $_POST['NomeCompleto'];
	$Endereco = $_POST['Endereco'];
	$DataNascimento = $_POST['DataNascimento'];
	$Telefone = $_POST['Telefone'];

	
		$sql = "UPDATE `assistido` SET `CPF`= '$CPF' ,`NomeCompleto`= '$NomeCompleto',`Endereco`= '$Endereco' ,`Telefone`= $Telefone, `DataNascimento` = '$DataNascimento'  WHERE `assistidoID` = $id";
		$atualizar = mysqli_query($conexao, $sql);
		

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
		if(mysqli_insert_id($conexao)){
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Atualizado com sucesso! </div>';
			header("Location: listar_assistido.php");
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao Atualizar </div>';
			header("Location: listar_assistido.php");
		}


?>
