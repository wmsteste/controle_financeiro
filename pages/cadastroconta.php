
<h2>Cadastro de contas</h2>

	
	<form method="POST" action="../app/functions/cad_conta.php">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Empresa</label>
      <input type="text" class="form-control" name="empresa" id="inputEmail4" placeholder="Nome" required="required">
    </div>
    <div class="form-group  col-md-4">
      <label for="inputPassword4">Valor</label>
      <input type="number" maxlength="9" step="0.01" class="form-control" name="valor" id="inputPassword4" placeholder="R$" required="required">
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Tipo</label>
      <select id="inputState" name="tipo" class="form-control" required="required" placeholder="Escolha a conta que deseja cadastrar">
      	<option> </option>
        <option>APARTAMENTO</option>
        <option>TELEFONIA</option>
        <option>LUZ</option>
        <option>AGUA</option>
        <option>INTERNET</option>
        <option>CARTÃO</option>
        <option>OUTROS</option>
      </select>
    </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Descrição</label>
      <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="2"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="dividir" id="gridCheck" value="1">
      <label class="form-check-label" for="gridCheck">
        COMPARTILHAR VALOR
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="fixo" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Fixo
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>

