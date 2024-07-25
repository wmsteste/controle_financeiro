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
	<h4>Somos um app e viemos para revolucionar o seu controle financeiro!</h4> 
	<div class="btn-group">
		<a class="btn btn-primary dropdown-toggle" data-bs-toggle="collapse" href="#mostrar2" role="button" aria-expanded="false" aria-controls="mostrar2">Valor Total R$: <?= number_format(ContaCompartilhadaFixa($link,$cod_vinc)+ContaPessoalFixa($link,$id_usuario)+ContasPessoais($link,$id_usuario)+ContasCompartilhadas($link,$cod_vinc),2,",",".") ?>
		</a>
		
		<div class="collapse" id="mostrar2">
			<div class="card card-body">
			<div class="col-md-12">
	    		
	    		<h5>Valor Compartilhado R$: <?= number_format(ContasCompartilhadas($link,$cod_vinc)+ContaCompartilhadaFixa($link,$cod_vinc),2,",",".") ?></h5> 
	    	</div>
	    	<div class="col-md-12">
	    		<h5>Gatos Pessoais R$: <?= number_format(ContaPessoalFixa($link,$id_usuario)+ContasPessoais($link,$id_usuario),2,",",".") ?></h5> 
	    	</div>
	    	</div>
	    </div>
		
	  </div>
		
		<a class="btn btn-primary  dropdown-toggle" data-bs-toggle="collapse" href="#mostrar" role="button" aria-expanded="false" aria-controls="mostrar" >Previsto para <?= dataPa($data) . ' R$: ' .  number_format(ValorCompartilhado($link,$cod_vinc)+ValorPessoal($link,$id_usuario)+ValorCompartilhadoFixo($link,$cod_vinc)+ValorPessoalFixo($link,$cod_vinc,$id_usuario),2,",",".") ?></a></p>
	    	<div class="collapse" id="mostrar">
	    		<div class="card card-body"><h5>usuarios: <?= qutd_user($link,$cod_vinc)?></h5>   
	    	 <h5>Contas Fixas Compartilhadas para o próximo mês R$: <?= number_format(ValorCompartilhadoFixo($link,$cod_vinc),2,",",".") ?> </h5> 
	    	 <h5>Contas não Fixas Compartilhadas para o próximo mês R$: <?= number_format(ValorCompartilhado($link,$cod_vinc),2,",",".") ?> </h5>
	    	 <h5>Contas Pessoais Fixas para o próximo mês R$: <?= number_format(ValorPessoalFixo($link,$cod_vinc,$id_usuario),2,",",".") ?> </h5>
	    	 <h5>Contas não Fixas Pessoais para o próximo mês R$: <?= number_format(ValorPessoal($link,$id_usuario),2,",",".") ?> </h5>
	    		</div>
	    	</div>
			
		
		
	    <hr />
	    
	    <div class="row flex-row justify-content-between">
	    	<div class="col-8  grafico">1</div>
	    	<div class="col-4 atualizar">2</div>
	    </div>
</div>	    			