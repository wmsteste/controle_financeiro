<?php 
if (!isset($_SESSION['nome'])) {
  header('Location: ../index.php?erro=1');
 }
   $data = date("d/m/y");
$cad_vinc = $_SESSION['cod_vinc'];
 ?>
<h2>Cadastro de contas</h2>

	
	<form method="POST" action="../app/functions/cad_conta.php">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control" name="empresa" id="inputEmpresa" placeholder="Nome" required="required">
    </div>
    <div class="form-group  col-md-4">
      <label for="inputPassword4">Valor</label>
      <input type="number" maxlength="7" step="0.01" data-decimals="2" class="form-control" name="valor" id="inputValor" placeholder="R$" required="required">
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
  <div id="botao"><button type="submit" class="btn btn-primary col-lg-auto">Cadastrar Conta</button></div>
</form>

