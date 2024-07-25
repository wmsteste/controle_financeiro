<?php

 session_start();

  if (!isset($_SESSION['id_usuario'])) {
  header('Location: ../index.php?erro=1');
 }
 
 require_once('db.class.php');
 require_once "functions/pages.php";
 require_once "../app/funcoes.php";
$objDb = new db();
$link = $objDb->conecta_mysql();


$id_usuario = $_SESSION['id_usuario'];
$usuario_nome = $_SESSION['nome'];
$cod_vinc = $_SESSION['cod_vinc'];
?>

<!DOCTYPE HTML>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Controle Financeiro compartilhado</title>
    

 
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/home.css">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


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
    <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark menu-bar">
    <div class="container-fluid ">
      <a class="navbar-brand" href="?page=inicio">Controle Financeiro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link btn-outline-success" aria-pressed="true" href="?page=inicio">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-outline-success" aria-current="true" href="?page=cadastroconta">Cadastrar contas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-outline-success" href="?page=cadastrouser" aria-current="true">Cadastrar dependentes</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link btn-outline-success dropdown-header dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true" aria-current="true">Contas</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="?page=view_contas">Contas compartilhadas</a></li>
              <li><a class="dropdown-item" href="?page=view_contas2">Contas Pessoais</a></li>
              <li><a class="dropdown-item" href="">...</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn btn-outline-success" type="submit"><a class="nav-link" href="sair.php" tabindex="-1" aria-current="true">Sair da conta</a></button>
        </form>
      </div>
    </div>
  </nav>
</header>
<br>
<br>
<br>
<!-- Begin page content -->
<div class="container">
	<?php

	try {
		require Load();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	  ?>
</div>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Construído por Wetech.com </span>
  </div>
</footer>


    <!-- JavaScript Bundle with Popper -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>
