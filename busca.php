<?php
// Incluir aquivo de conexão
include("app/db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

// Recebe o valor enviado
$valor = $_GET['valor'];

// Procura titulos no banco relacionados ao valor
$sql = mysqli_query($link,"SELECT * FROM usuarios WHERE email = '$valor'");

// Exibe todos os valores encontrados
while ($noticias = mysqli_fetch_object($sql)) {
	$res = $noticias->email;
	if ($res === $valor) {
		echo "<font color='#FF0000'> Esse e-mail ja pertence a um usuario ja cadastrado</font>";
	}
	
	
}	
    


// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>