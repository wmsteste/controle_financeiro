
<?php
  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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
  <form method="post" action="app/validar_acesso.php" id="formLogin">
    <img class="mb-4" src="imagens/dinheiro.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Controle Financeiro</h1>
    <label for="inputEmail" class="visually-hidden">Email </label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
    <label for="inputPassword" class="visually-hidden">Senha</label>
    <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar Login</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <br>
    <br>
    <a href="inscreva.php">Inscreva-se</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
              <?php

                if ($erro==1) {
                  echo '<font color="#FF0000">Usuário ou senha inválido(s)</font>';
                }

              ?>
</main>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>
