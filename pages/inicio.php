<?php 
if (!isset($_SESSION['nome'])) {
 	header('Location: ../index.php?erro=1');
 }
 $data = date('m')+1;
 $data2 = date('m');

 function dataPa($data){
 	switch ($data) {
 		
 	case '1':
 		$data ='Janeiro';
 		break;
 	case '2':
 		$data ='Fevereiro';
 		break;
 	case '03':
 		$data ='Março';
 		break;
 	case '4':
 		 $data ='Abril'	;
 		break;
 	case '5':
 		$data ='Maio';
 		break;
 	case '6':
 		$data ='Junho';
 		break;
 	case '7':
 		$data ='Julho';
 		break;
 	case '8':
 		$data ='Agosto';
 		break;
 	case '9':
 		$data ='Setembro';
 		break;
 	case '10':
 		$data ='Outubro';
 		break;
 	case '11':
 		$data ='Novembro';
 		break;
 	case '12':
 		$data ='Dezembro';
 		break;
}
 	return $data;

 }
  function dataPa2($data2){
 	switch ($data2) {
 		
 	case '1':
 		$data2 ='Janeiro';
 		break;
 	case '2':
 		$data2 ='Fevereiro';
 		break;
 	case '3':
 		$data2 ='Março';
 		break;
 	case '4':
 		 $data2 ='Abril'	;
 		break;
 	case '5':
 		$data2 ='Maio';
 		break;
 	case '6':
 		$data2 ='Junho';
 		break;
 	case '7':
 		$data2 ='Julho';
 		break;
 	case '8':
 		$data2 ='Agosto';
 		break;
 	case '9':
 		$data2 ='Setembro';
 		break;
 	case '10':
 		$data2 ='Outubro';
 		break;
 	case '11':
 		$data2 ='Novembro';
 		break;
 	case '12':
 		$data2 ='Dezembro';
 		break;
}
 	return $data2;

 }
?>

<div class="panel-body">
	<h4>Bem vindo, <?= $_SESSION['nome'] ?>!</h4><br>
	<div class="col-md-6">
	    		<h5>usuarios: <?= qutd_user($cod_vinc)?></h5>  
	    	 <h5>Valor Contas Pagas Mes <?= datapa2($data2) ?>  <?= number_format(ValorGastoTotal($cod_vinc,$_SESSION['id_usuario']),2,",",".") ?> </h5> 
	    	 <h5>Contas Fixas Compartilhada  <?= number_format(ValorCompartilhadoFixo($cod_vinc),2,",",".") ?> </h5> 
	    	</div>
	    	<div class="col-md-6">
	    		 <h5>Gastos previsto para <?=dataPa($data)?> </h5>
	    	</div>
	<div class="">
		<hr />
			<div class="col-md-12">
	    		<h4>Somos um app e viemos para revolucionar o seu controle financeiro!</h4> 
	    		<h5>Valor Compartilhado R$: <?= number_format(ValorCompartilhado($cod_vinc)+ValorCompartilhadoFixo($cod_vinc),2,",",".") ?></h5> 
	    	</div>
	    	<div class="col-md-12">
	    		<h5>Gatos Pessoais R$: <?= number_format(ValorPessoal($_SESSION['id_usuario']),2,",",".") ?></h5> 
	    	</div>

	    	<div class="col-md-12">
	    		<h5>Valor Total R$: <?= number_format(ValorCompartilhado($cod_vinc)+ValorPessoal($_SESSION['id_usuario'])+ValorCompartilhadoFixo($cod_vinc),2,",",".") ?></h5> 
	    	</div>
	    	
	</div>
</div>

	    			