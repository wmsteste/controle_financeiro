<?php
// Incluir aquivo de conexão
include("app/db.class.php");

// Recebe a id enviada no método GET
$id = $_GET['email'];

// Seleciona a noticia que tem essa ID
$sql = mysql_query("SELECT * FROM noticias WHERE id = '".$id."'");

// Pega os dados e armazena em uma variável
$noticia = mysql_fetch_object($sql);

// Exibe o conteúdo da notica
echo $noticia->conteudo;

// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>