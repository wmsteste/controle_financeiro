	<?php
if (!isset($_SESSION['nome'])) {
  header('Location: ../index.php?erro=1');
 }
  $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
 $cod_vinc = $_SESSION['cod_vinc'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>CONTROLE FINANCEIRO</title>
  <script type="text/javascript" src="funcs.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<style type="text/css">
  div.labelC{
    top: 50%;
    height: 3em;
    text-align: center
  }
  div.botao{
    text-align: center
  }

</style>
</head>
<body> <div class="container">
 <div class="labelC"> <h4>CADASTRE-SE</h4></div>
<form method="POST" action="home.php?page=cadastrouser" id="ajax_form" name="car_user" >
  <div class="form-row">
    <div class="col">
      <label for="inputNome">Primeiro Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Primeiro Nome"  required="required">      
    </div>
    <div class="col">
      <label for="inputNome">Sobrenome</label>
      <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome"required="required">      
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" onkeyup="buscarNoticias(this.value)" required="requiored">
      <div id="resultado"></div>
      <div id="conteudo"></div>
            <?php

                if ($erro_email==1) {
                  echo '<font color="#FF0000"> Esse e-mail já pertence a um usuário já cadastrado</font>';
                }

              ?>
            
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone">Telefone </label>
      <input type="number" class="form-control" id="telefone" name="telefone" placeholder="(**)99999-9999" min="10"  required="requiored">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required="requiored">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Complemento</label>
    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Apartamento, hotel, casa, etc." required="requiored">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required="requiored">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEstado">Estado</label>
      <select id="estado" name="estado" class="form-control" >
        <option selected>Escolher...</option>
        <option>MG</option>
        <option>SP</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" id="CEP" name="CEP" placeholder="CEP" required="requiored">
    </div>
  </div>
  <input type="hidden" name="cod_vinc" value="<?=$cod_vinc?>">
  
  <button type="submit" id="botao" class="btn btn-primary">Cadastrar</button>
 
</form>

<script type="text/javascript">

function limpa() {  
  var form   = document.getElementById('ajax_form');
   var nome   = form.nome.value;
   form.reset();
}
</script>
<script type="text/javascript">
  
  jQuery('document').ready(function() {
  jQuery('#ajax_form').submit(function() {
    var dados = jQuery(this).serialize();
    //aqui voce pega o conteudo do atributo action do form
    var url = $(this).attr('action');
    jQuery.ajax({
      type: "POST",
      url: "../app/registra_usuario_2.php",
      data: dados,
      success: function(response) {
        //'response' é a resposta do servidor
        
        alert(response);
        limpa();
      }
    });

    return false;
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</div></body>
</html>
