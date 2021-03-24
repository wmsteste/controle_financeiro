<?php
require_once('db.class.php');


	 $nome = $_POST['nome'];
	 $sobrenome = $_POST['sobrenome'];
	 $email = $_POST['email'];
	 $senha = md5($_POST['senha']);
	 $celular =$_POST['telefone'];
	 $endereco = $_POST['endereco'];
	 $complemento = $_POST['complemento'];
	 $cidade = $_POST['cidade'];
	 $estado = $_POST['estado'];
	 $cep = $_POST['CEP'];

$button2 = "<a href=../index.php><button>Voltar para Login</button></a>";


$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$email_existe = false;


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


if ($email_existe) {

	$retorno_get = '';

	if($email_existe){
		$retorno_get.="erro_email=1&";
	}

	header('Location: ../inscreva.php?'.$retorno_get);
	die();
}

$sql = "insert into usuarios(nome, sobrenome, email, senha, celular, endereco, complemento, cidade, estado, cep) values('$nome','$sobrenome', '$email', '$senha','$celular', '$endereco', '$complemento', '$cidade', '$estado', '$cep')";

//executar a query
if(mysqli_query($link, $sql)){
	echo "Usuario registrado com Sucesso";
	echo "<br><br><br>";
	echo $button2;

} else{
	echo "Erro ao registrar Usuário";
}

?>