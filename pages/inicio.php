<?php 
if (!isset($_SESSION['nome'])) {
 	header('Location: ../index.php?erro=1');
 }
?>

<div class="panel-body">
	<h4>Bem vindo, <?= $_SESSION['nome'] ?>!</h4><br>
	<div class="col-md-12">
	    		<h5>usuarios: <?= qutd_user($cod_vinc)?></h5> 
	    	</div>
	<div class="">
		<hr />
			<div class="col-md-12">
	    		<h4>Somos um app e viemos para revolucionar o seu controle financeiro!</h4> 
	    		<h5>Valor Compartilhado R$: <?= number_format(ValorCompartilhado($cod_vinc),2,",",".") ?></h5> 
	    	</div>
	    	<div class="col-md-12">
	    		<h5>Gatos Pessoais R$: <?= number_format(ValorPessoal($_SESSION['id_usuario']),2,",",".") ?></h5> 
	    	</div>
	    	<div class="col-md-12">
	    		<h5>Valor Total R$: <?= number_format(ValorCompartilhado($cod_vinc)+ValorPessoal($_SESSION['id_usuario']),2,",",".") ?></h5> 
	    	</div>
	    	
	</div>
</div>

	    			