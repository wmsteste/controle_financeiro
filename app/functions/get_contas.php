<<?php 

	session_start();
	require_once('db.class.php');

	$usuario = $_POST['email'];
	$senha = md5($_POST['senha']);


	$sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir FROM conta ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if (isset($dados_usuario['email'])) {
		
			$_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
			$_SESSION['id_conta'] = $dados_usuario['id_conta'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['empresa'] = $dados_usuario['empresa'];
			$_SESSION['valor'] = $dados_usuario['valor'];
			$_SESSION['tipo'] = $dados_usuario['tipo'];
			$_SESSION['descricao'] = $dados_usuario['discricao'];
			$_SESSION['fixo'] = $dados_usuario['fixo'];
			$_SESSION['dividir'] = $dados_usuario['dividir'];

			
		}else{
			header('location: ../index.php?erro=1');
		}
		
	}else{
		echo "Erro na execução da consulta, favor entrar em contato com o Administrador do site";
	}
 ?>