<?php 
if (!isset($_SESSION['nome'])) {
  header('Location: ../index.php?erro=1');
 }
   $data = date("d/m/y");
$cad_vinc = $_SESSION['cod_vinc'];
 ?>
 
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  

 </head>
 <body>
<h2>Cadastro de contas</h2>

	
	<form method="POST" action="home.php?page=cadastroconta" id="ajax_form2" name="" >
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control" name="empresa" id="inputEmpresa" placeholder="Nome" required="required">
    </div>
    <div class="form-group  col-md-4">
      <label for="inputPassword4">Valor</label>
      <input type="number" maxlength="7" min="0.01" step="0.01" data-decimals="2" class="form-control" name="valor" id="inputValor" placeholder="R$" required="required">
    </div>
    <div class="form-group col-md-2">
      <label for="inputTipo">Parcelado?</label>
      <input type="number" name="parcelado" maxlength="2" min="1" class="form-control" required="required">
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Tipo</label>
      <select id="inputState" name="tipo" class="form-control" required="required" >
      	<option selected=""> Selecione</option>
        <option>APARTAMENTO</option>
        <option>TELEFONIA</option>
        <option>LUZ</option>
        <option>AGUA</option>
        <option>INTERNET</option>
        <option>CARTÃO</option>
        <option>OUTROS</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputTipo">Para</label>
      <input type="date" name="data_para" class="form-control" required="required">
    </div>
     <div class="form-group col-md-2">
      <label for="inputTipo">Data de cadastro</label>
      <input type="text"  id="date" class="form-control" value="<?php echo date('d/m/Y');?>" readonly >
      <input type="hidden" name="data_cad" id="date" class="form-control" value="<?php echo date('Y-m-d');?>" >
    </div>
    
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Descrição</label>
      <textarea class="form-control" name="descricao" style="resize: none" id="exampleFormControlTextarea1" cols="2" rows="4"></textarea>
    </div>
  </div>
  <h5>O valor é:</h5>
  <div class="form-check">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="dividir" id="gridCheck" value="1" required="required">
      <label class="form-check-label" for="gridCheck">
        COMPARTILHADO
      </label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="dividir" id="gridCheck" value="0"  >
      <label class="form-check-label" for="gridCheck">
        PESSOAL
      </label>
    </div>
  </div>
  <div class="form-check form-check-inline">
    <h5><label>Valor é fixo?</label></h5>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="fixo" id="gridCheck" value="sim" required="required">
      <label class="form-check-label" for="gridCheck">
       SIM
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="fixo" id="gridCheck" value="nao">
      <label class="form-check-label" for="gridCheck">
        NÃO
      </label>
    </div>
  </div><br>
  <input type="hidden" name="cod_vinc" value="<?=$cod_vinc?>">
  <center><button type="submit" class="btn btn-primary col-lg-auto">Cadastrar Conta</button></center>
</form>
<script type="text/javascript">

function limpa() {  
  document.getElementById('ajax_form2').reset();
   
}
</script>
<script type="text/javascript">
  
  jQuery('document').ready(function() {
  jQuery('#ajax_form2').submit(function() {
    var dados = jQuery(this).serialize();
    //aqui voce pega o conteudo do atributo action do form
    var url = $(this).attr('action');
    jQuery.ajax({
      type: "POST",
      url: "../app/functions/cad_conta.php",
      data: dados,
      success: function(response) {
        //'response' é a resposta do servidor
        if (response =='Conta registrada com Sucesso') {
          alert(response);
          limpa();
        }else{
          alert(response);
        }
        
      }
    });

    return false;
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>