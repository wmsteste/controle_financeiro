<?php 
if (!isset($_SESSION['nome'])) {
 	header('Location: ../index.php?erro=1');
 }
$sql = "SELECT sum(valor) FROM contas WHERE dividir ='1'";
$resultado_id = mysqli_query($link, $sql);
$qtde_soma = 0;
if ($resultado_id) {
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	
	$qtde_soma = $registro['sum(valor)']/2;
	
}else{
	echo "Erro ao executar a query";
}
$usuario = $_SESSION['id_usuario'];
$sql2 = "SELECT sum(valor) FROM contas WHERE id_usuario='$usuario' AND dividir !='1'";
$resultado_id2 = mysqli_query($link, $sql2);
$qtde_soma2 = 0;
if ($resultado_id2) {
	$registro2 = mysqli_fetch_array($resultado_id2, MYSQLI_ASSOC);
	
	$qtde_soma2 = $registro2['sum(valor)'];
	
}else{
	echo "Erro ao executar a query";
}
$valor=$qtde_soma2 + $qtde_soma;
?>

<div class="panel-body">
	    				<h4>Bem vindo, <?= $_SESSION['nome'] ?>!</h4>
	    				<hr />
	    				<div class="col-md-12">
	    					<h4>Somos um app e viemos para revolucionar o seu controle financeiro!</h4> 
	    					<h5>Valor Apartamento R$: <?= $qtde_soma?></h5> 
	    				</div>
	    				<div class="col-md-12">
	    					<h5>Valor Individual R$: <?= $qtde_soma2?></h5> 
	    				</div>
	    				<div class="col-md-12">
	    					<h5>Valor Soma R$: <?=$valor ?></h5> 
	    				</div>
	    			</div>

	    			