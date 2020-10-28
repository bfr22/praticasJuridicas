<!--Inserir no Banco-->


<?php

include '../conexao.php';



	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$CPF = $_POST['CPF'];
	$Endereco = $_POST['Endereco'];
	$Telefone = $_POST['Telefone'];
	$DataNascimento = $_POST['DataNascimento'];
	$NomeCompleto = $_POST['NomeCompleto'];
	$Ativo = 1;

	


////////////////VALIDAÇÕES ///////////////////////////////

$erro = false;



//*****Numero CPF existente

$busca = "SELECT `CPF` FROM `assistido` WHERE `CPF`= '$CPF'";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse CPF!! </div>';
	header("Location: cadastrarAssistido.php");
} //fim if validações (RA existente)


////////////////VALIDAÇÕES ///////////////////////////////

if(!$erro){



	$sql = "INSERT INTO `assistido`( `CPF`, `NomeCompleto`, `Endereco`, `DataNascimento`, `Telefone`, `Ativo`) VALUES ('$CPF', '$NomeCompleto', '$Endereco', '$DataNascimento', $Telefone, $Ativo)";

		$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida
	

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso! </div>';
		header("Location: listar_assistido.php");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
		header("Location: listar_assistido.php");
	}

} //fim if de cadastro
?>



