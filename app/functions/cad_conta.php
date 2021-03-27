<?php
session_start();

require_once('../db.class.php');

$id_usuario1 = $_SESSION['id_usuario'];
$id_usuario = $_SESSION['nome'];


	 $nome = $id_usuario = $_SESSION['nome'];
	 $empresa = $_POST['empresa'];
	 $valor = $_POST['valor'];
	 $tipo = $_POST['tipo'];
	 $descricao = $_POST['descricao'];
	 $fixo = $_POST['fixo'];
	 $dividir = $_POST['dividir'];
	 $data_cad = $_POST['data_cad'];
	 $data_para = $_POST['data_para'];
	 $cod_vinc = $_POST['cod_vinc'];


$button2 = "<a href= http://localhost/controle_financeiro/app/home.php?page=cadastroconta ><button>SIM</button></a>";
$botao ="<a href= http://localhost/controle_financeiro/app/home.php?pages=inicio ><button>NÃO</button></a>";


$objDb = new db();
$link = $objDb->conecta_mysql();

	
	
	$sql = "INSERT INTO contas(id_usuario, nome, empresa, valor, tipo, descricao, fixo, dividir, data_cad, data_para, cod_vinc)VALUES('$id_usuario1', '$nome', '$empresa', '$valor', '$tipo', '$descricao', '$fixo', '$dividir', '$data_cad', '$data_para', '$cod_vinc')";

//executar a query
if(mysqli_query($link, $sql)){
	echo "<h2>Conta registrada com Sucesso</h2>";
	echo "<br><br><br>";
	echo "<h3>Cadastar Nova Conta?</h3>";
echo $button2.' '. $botao  ;


} else{
	echo "Erro ao registrar Conta";
	echo $button2.' '. $botao  ;
}



?>
