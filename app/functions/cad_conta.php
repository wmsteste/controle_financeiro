<?php
session_start();

require_once('../db.class.php');

$id_usuario1 = $_SESSION['id_usuario'];
$id_usuario = $_SESSION['nome'];
$mes=0;


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
	 $situacao ='nao';
	 $parcelado = $_POST['parcelado'];

$objDb = new db();
$link = $objDb->conecta_mysql();

if ($parcelado =='1') {
	if ($fixo =='sim') {

		for ($i= 1 ; $i <= 12; $i++) { 
		$mes++;
		$data_para=date('Y/m/d', strtotime($mes."month"));

		$sql = "INSERT INTO contas(id_usuario, nome, empresa, valor, tipo, descricao, fixo, dividir, data_cad, data_para,situacao, cod_vinc)VALUES('$id_usuario1', '$nome', '$empresa', '$valor', '$tipo', '$descricao', '$fixo', '$dividir', '$data_cad', '$data_para','$situacao', '$cod_vinc')";

		if(mysqli_query($link, $sql)){
	}
	}
	echo "Conta registrada com Sucesso";
	
		
	}elseif ($fixo=='nao') {
		
	
	$sql = "INSERT INTO contas(id_usuario, nome, empresa, valor, tipo, descricao, fixo, dividir, data_cad, data_para,situacao, cod_vinc)VALUES('$id_usuario1', '$nome', '$empresa', '$valor', '$tipo', '$descricao', '$fixo', '$dividir', '$data_cad', '$data_para','$situacao', '$cod_vinc')";

//executar a query
if(mysqli_query($link, $sql)){
	echo "Conta registrada com Sucesso";
	


} else{
	echo "Erro ao registrar Conta";
	
}
}
}elseif ($parcelado > '1') {
 
	for ($i= 1 ; $i <= $parcelado; $i++) { 
		$mes++;
		$valor1=$valor/$parcelado;
		$data_para=date('Y/m/d', strtotime($mes."month"));

		$sql = "INSERT INTO contas(id_usuario, nome, empresa, valor, tipo, descricao, fixo, dividir, data_cad, data_para,situacao, cod_vinc)VALUES('$id_usuario1', '$nome', '$empresa', '$valor1', '$tipo', '$descricao', '$fixo', '$dividir', '$data_cad', '$data_para','$situacao', '$cod_vinc')";

		if(mysqli_query($link, $sql)){
	}
	}
	
	echo "Conta registrada com Sucesso";
	
}


?>
