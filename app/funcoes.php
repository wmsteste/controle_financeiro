<?php
require_once 'db.class.php';

$objDb = new db(); 
$link = $objDb->conecta_mysql();

function qutd_user($link,$cod_vinc){


	$sql4 = "SELECT id FROM usuarios WHERE cod_vinc='$cod_vinc'";
    $usue = mysqli_query($link, $sql4);
    $qtd_user = mysqli_num_rows($usue);
return $qtd_user;
}
//valor compartilhado
function ValorCompartilhado($link,$cod_vinc){
$data = date('m')+1;
$sql = "SELECT sum(valor) FROM contas WHERE dividir ='1' AND cod_vinc='$cod_vinc' AND MONTH(data_para)='$data' AND fixo='nao'";
	$resultado_id = mysqli_query($link, $sql);
	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		$qtde_user = qutd_user($link,$cod_vinc);

		$qtde_soma = $registro['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma;
}
// fim da função de vavlor compartilhado

function ValorPessoal($link,$id_usuario){

$data = date('m')+1;

$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$id_usuario' AND dividir ='0' AND MONTH(data_para)='$data' AND fixo='não'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		
		$qtde_soma1 = $registro2['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ValorGastoTotalPago($link,$cod_vinc,$id_usuario){

		$qtde_soma1 = ContasPagasCom($link,$cod_vinc);
		$qtde_soma2 = ContasPagasPes($link,$id_usuario);
		$qtd = $qtde_soma1+$qtde_soma2;
		

return $qtd;
}

function ContasPagasCom($link,$cod_vinc){
$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE cod_vinc='$cod_vinc' AND dividir ='1' AND MONTH(data_para)='$data' AND situacao='sim'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_user = qutd_user($cod_vinc);
		$qtde_soma1 = $registro2['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ContasPagasPes($link,$id_usuario){

$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$id_usuario' AND dividir ='0' AND MONTH(data_para)='$data' AND situacao='sim'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_soma1 = $registro2['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ValorCompartilhadoFixo($link,$cod_vinc){

$data = date('m')+1;

$sql = "SELECT sum(valor) FROM contas WHERE dividir ='1' AND cod_vinc='$cod_vinc' AND MONTH(data_para)='$data' AND fixo='sim'";
	$resultado_id = mysqli_query($link, $sql);
	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		$qtde_user = qutd_user($link,$cod_vinc);

		$qtde_soma = $registro['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma;
}
 
function ValorPessoalFixo($link,$cod_vinc,$id_usuario){

$data = date('m')+1;
$sql = "SELECT sum(valor) FROM contas WHERE dividir ='0' AND id_usuario='$id_usuario' AND MONTH(data_para)='$data' AND fixo='sim'";
	$resultado_id = mysqli_query($link, $sql);
	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		$qtde_soma = $registro['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma;
}


function ContasCompartilhadas($link,$cod_vinc){

$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE cod_vinc='$cod_vinc' AND dividir ='1' AND MONTH(data_para)='$data' AND fixo='nao'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_user = qutd_user($link,$cod_vinc);
		$qtde_soma1 = $registro2['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ContasPessoais($link,$id_usuario){

$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$id_usuario' AND dividir ='0' AND MONTH(data_para)='$data' AND fixo='nao'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_soma1 = $registro2['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ContaPessoalFixa($link,$id_usuario){

$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$id_usuario' AND dividir ='0' AND MONTH(data_para)='$data' AND fixo='sim'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_soma1 = $registro2['sum(valor)'];
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function ContaCompartilhadaFixa($link,$cod_vinc){

$data = date('m');

$sql2 = "SELECT sum(valor) FROM contas WHERE cod_vinc='$cod_vinc' AND dividir ='1' AND MONTH(data_para)='$data' AND fixo='sim'";

	$resultado_id2 = mysqli_query($link, $sql2);
	if ($resultado_id2) {
		$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
		$qtde_user = qutd_user($link,$cod_vinc);
		$qtde_soma1 = $registro2['sum(valor)']/$qtde_user;
		
	}else{
		echo "Erro ao executar a query";
	}

return $qtde_soma1;
}

function Pesq_Mes($link,$data1,$data2,$cod_vinc){
$sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir,situacao FROM contas WHERE dividir='1' AND cod_vinc = '$cod_vinc', data_para BETWEEN data_para='$data1' AND data_para='$data2'";

  $resultado_id = mysqli_query($link, $sql);


  $table  = '<table class="table table-bordered table-hover">';
  $table .= '<thead class="thead-dark">';
  $table .= '<tr>';
  $table .= '<th scope="col">ID CONTA</th>';
  $table .= '<th scope="col">Empresa</th>';
  $table .= '<th scope="col">Valor</th>';
  $table .= '<th scope="col">Tipo</th>';
  $table .= '<th scope="col">Fixo</th>';
  $table .= '<th scope="col">Descrição</th>';
  $table .= '<th scope="col">Cadastro feito por</th>';
  $table .= '<th scope="col">Situação</th>';
  $table .= '<th scope="col">Editar</th>';
  $table .= '<th scope="col">Excluir</th>';
  $table .= '</tr>';
  $table .= '</thead>';
  $table .= '<tbody>';

  while ($dados_usuario=mysqli_fetch_array($resultado_id)) {
if ($dados_usuario['situacao']=="sim") {
  $table .= "<tr>";
  $table .= "<th>{$dados_usuario['id_conta']}</th>";
  $table .= "<td>{$dados_usuario['empresa']}</td>";
  $table .= "<td>R$ {$dados_usuario['valor']}</td>";
  $table .= "<td>{$dados_usuario['tipo']}</td>";
  $table .= "<td>{$dados_usuario['fixo']}</td>";
  $table .= "<td>{$dados_usuario['descricao']}</td>";
  $table .= "<td>{$dados_usuario['nome']}</td>";
  $table .= "<td><strong>Paga</strong></td>";
  $table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
  $table .= "<td><a href='../app/functions/apague_conta.php?id_conta={$dados_usuario['id_conta']}&id_form=1'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
  $table .= "</tr>";
  $table .= "</thead>";
  $table .= "</tbody>";
}else {
  $table .= "<tr>";
  $table .= "<th>{$dados_usuario['id_conta']}</th>";
  $table .= "<td>{$dados_usuario['empresa']}</td>";
  $table .= "<td>R$ {$dados_usuario['valor']}</td>";
  $table .= "<td>{$dados_usuario['tipo']}</td>";
  $table .= "<td>{$dados_usuario['fixo']}</td>";
  $table .= "<td>{$dados_usuario['descricao']}</td>";
  $table .= "<td>{$dados_usuario['nome']}</td>";
  $table .= "<td><a href='../app/functions/updateConta.php?id_conta={$dados_usuario['id_conta']}&id_form=1'><button type='button' class='btn btn-danger'>Pagar</button></td>";
  $table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
  $table .= "<td><a href='../app/functions/apague_conta.php?id_conta={$dados_usuario['id_conta']}'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
  $table .= "</tr>";
  $table .= "</thead>";
  $table .= "</tbody>";
}

}
return $table;

}

?>
