<?php
session_start();
 

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$id_usuario = $_SESSION['nome'];

	
	 $empresa = $_GET['empresa'];
	 $valor = $_GET['valor'];
	 $tipo = $_GET['tipo'];
	 $descricao = $_GET['descricao'];
	 $fixo = $_GET['fixo'];
	 $dividir = $_GET['dividir'];


$button2 = "<a href=indexx.php><button>Voltar para Login</button></a>";


$objDb = new db();
$link = $objDb->conecta_mysql();

/*
if ($texto_tweet == '' || $id_usuario == '' ) {
	die();
}
*/
$sql = "INSERT INTO contas(empresa, valor, tipo, descricao, fixo, dividir)values('$empresa', '$valor', '$tipo', '$descricao', '$fixo', '$dividir')";

//executar a query
if(mysqli_query($link, $sql)){
	echo "Conta registrada com Sucesso";
	echo "<br><br><br>";
	echo $button2;

} else{
	echo "Erro ao registrar Conta";
}

	/*// verificar se o usuario ja existe
$sql = "select * from usuarios where usuario ='$usuario'";
if($resultado_id = mysqli_query($link, $sql)){
	$dados_usuario = mysqli_fetch_array($resultado_id);

	if (isset($dados_usuario['usuario'])) {
		$usuario_existe = true;
	}	

}else{
	echo "Erro ao tentar localizar o registro de usuario";
}



	// verificar se o email ja existe
	$sql = "select * from usuarios where email ='$email'";
if($resultado_id = mysqli_query($link, $sql)){
	$dados_usuario = mysqli_fetch_array($resultado_id);

	if (isset($dados_usuario['email'])) {
		$email_existe = true;
	}
	
}else{
	echo "Erro ao tentar localizar o registro de email";
}

if ($usuario_existe || $email_existe) {

	$retorno_get = '';

	if($usuario_existe){
		$retorno_get.="erro_usuario=1&";
	}
	if($email_existe){
		$retorno_get.="erro_email=1&";
	}

	header('Location: inscreva.php?'.$retorno_get);
	die();
}

$sql = "insert into contas(empresa, valor, tipo, descricao, fixo, dividir) values($empresa, $valor, $tipo, $descricao, $fixo, $dividir)";

//executar a query
if(mysqli_query($link, $sql)){
	echo "Conta registrada com Sucesso";
	echo "<br><br><br>";
	echo $button2;

} else{
	echo "Erro ao registrar Conta";
}

?>