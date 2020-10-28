<!--Inserir no Banco-->


<?php

include '../conexao.php';



	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$Numero = $_POST['Numero'];
	$Descricao = $_POST['Descricao'];
	$Forum = $_POST['Forum'];
	$Situacao = $_POST['Situacao'];
	$DataTime= new DateTime();
	$DataEntrada = $DataTime->format('Y-m-d');
	$Ativo = 1;


////////////////VALIDAÇÕES ///////////////////////////////

$erro = false;



//*****Numero existente

$busca = "SELECT `Numero` FROM `processo` WHERE `Numero`= $Numero";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Numero!! </div>';
	header("Location: cadastrarProcesso.php");
} //fim if validações (RA existente)


////////////////VALIDAÇÕES ///////////////////////////////

if(!$erro){



	$sql = "INSERT INTO `processo`( `Numero`, `Descricao`, `Forum`, `Situacao`, `DataEntrada`, `Ativo`) VALUES ($Numero, ('$Descricao'), ('$Forum'), '$Situacao', '$DataEntrada', $Ativo)";

		$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida
	

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso! </div>';
		header("Location: listar_processo.php");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
		header("Location: listar_processo.php");
	}

} //fim if de cadastro
?>



