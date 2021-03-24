<?php 
	require_once('../db.class.php');

 	 $tipo = $_POST['tipo'];
	 $sobrenome = $_POST['sobrenome'];
	 $email = $_POST['email'];
	
	 $celular =$_POST['telefone'];

	$sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir FROM contas WHERE tipo = '$tipo' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

$table  = '<table class="table">';
$table .= '<thead>';
$table .= '<tr>';
$table .= '<th>Selecionar Cliente</th>';
$table .= '<th>idCliente</th>';
$table .= '<th>Nome</th>';
$table .= '<th>Telefone</th>';
$table .= '<th>Endereço</th>';
$table .= '<th>Email</th>';
$table .= '<th>Editar</th>';
$table .= '<th>Excluir</th>';
$table .= '</tr>';
$table .= '</thead>';
$table .= '<tbody>';


	//$dados_usuario = mysqli_fetch_assoc($resultado_id);
	while ($dados_usuario=mysqli_fetch_array($resultado_id)) {
$table .= "<tr>";
$table .= "<th>{$dados_usuario['id_conta']}</th>";
$table .= "<td>{$dados_usuario['empresa']}</td>";
$table .= "<td>{$dados_usuario['valor']}</td>";
$table .= "<td>{$dados_usuario['tipo']}</td>";
$table .= "<td>{$dados_usuario['descricao']}</td>";
$table .= "<td>{$dados_usuario['fixo']}</td>";
$table .= "<td>{$dados_usuario['dividir']}</td>";
$table .= "<td>{$dados_usuario['id_usuario']}</td>";
$table .= "</tr>";
$table .= "</thead>";
$table .= "</tbody>";
	}
	echo $table;
	
		
	else{
		 "Erro na execução da consulta, favor entrar em contato com o Administrador do site";
	}
 ?>