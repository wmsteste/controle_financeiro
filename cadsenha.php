<?php

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
 session_start();
  require_once('db.class.php');

  $usuario = $_POST['email'];
  $senha = md5($_POST['senha']);


  $sql = " SELECT id,nome,email,senha,cod_vinc FROM usuarios WHERE email ='$usuario' AND senha ='$senha' ";

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

  if ($resultado_id) {
    
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if (isset($dados_usuario['email'])) {
    
      $_SESSION['id_usuario'] = $dados_usuario['id'];
      $_SESSION['nome'] = $dados_usuario['nome'];
      $_SESSION['email'] = $dados_usuario['email'];
      $_SESSION['cod_vinc'] = $dados_usuario['cod_vinc'];

      header('location: home.php');
    }else{
      header('location: ../index.php?erro=1');
    }
    
  }else{
    echo "Erro na execução da consulta, favor entrar em contato com o Administrador do site";
  }


?>

<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Controle Financeiro</title>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="app/validarsenha.php" id="formLogin">
    <img class="mb-4" src="imagens/dinheiro.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Controle Financeiro</h1>
    <label for="inputEmail" class="visually-hidden">Email </label>
    <input type="desabled" id="inputEmail" name="email" class="form-control" placeholder="Email" value="<?= $_SESSION['nome'] ?>" readonly>
    <label for="inputPassword" class="visually-hidden">Senha</label>
    <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Inserir Senha" required>
    <input type="password" id="inputPassword" name="senhaConfirma" class="form-control" placeholder="Confirme sua Senha" required>
    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
    <br>
    <br>
    <a href="inscreva.php">Inscreva-se</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
              <?php

                if ($erro==1) {
                  echo '<font color="#FF0000">Senhas não Conferem</font>';
                }

              ?>
</main>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>
