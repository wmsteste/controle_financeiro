<?php
require_once 'db.class.php';

function qutd_user($cod_vinc){
$objDb = new db();
$link = $objDb->conecta_mysql();

	$sql4 = "SELECT id FROM usuarios WHERE cod_vinc='$cod_vinc'";
    $usue = mysqli_query($link, $sql4);
    $qtd_user = mysqli_num_rows($usue);
return $qtd_user;
}

function ValorCompartilhado($cod_vinc){

$objDb = new db();
$link = $objDb->conecta_mysql();
$data = date('m')+1;
$qtde_user = qutd_user($cod_vinc);

$sql = "SELECT sum(valor) FROM contas WHERE dividir ='1' AND cod_vinc='$cod_vinc' AND MONTH(data_para)='$data'";
	$resultado_id = mysqli_query($link, $sql);
	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		$qtde_user = qutd_user($cod_vinc);

		$qtde_soma = $registro['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma;
}

function ValorPessoal($id_usuario){
$objDb = new db();
$link = $objDb->conecta_mysql();
$data = date('m')+1;

$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$id_usuario' AND dividir ='0' AND MONTH(data_para)='$data'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		
		$qtde_soma1 = $registro2['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}


?>
