<?php

	session_start();
	require_once('db.class.php');

	$usuario = $_POST['email'];
	$senha = md5($_POST['senha']);


	$sql = " SELECT id,nome,email,senha FROM usuarios WHERE email ='$usuario' AND senha ='$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if ($resultado_id) {
		
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if (isset($dados_usuario['email'])) {
		
			$_SESSION['id_usuario'] = $dados_usuario['id'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('location: home.php');
		}else{
			header('location: ../index.php?erro=1');
		}
		
	}else{
		echo "Erro na execução da consulta, favor entrar em contato com o Administrador do site";
	}

	

	

	//update true/false
	//insert true/false
	//select false/resource
	//delete true/false
?>