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
	 $cod_vinc = $_POST['cod_vinc'];

$button2 = "<a href=../home.php?page=inicio><button>Voltar para Login</button></a>";


$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$email_existe = false;


	// verificar se o email ja existe
	$sql = "SELECT * FROM usuarios WHERE email ='$email'";
if($resultado_id = mysqli_query($link, $sql)){
	$dados_usuario = mysqli_fetch_array($resultado_id);

	if ($dados_usuario['email']===$email) {
		$retorno_get="Email Já Cadastrado";
		echo "$retorno_get";
	}else{
		$sql = "insert into usuarios(nome, sobrenome, email, senha, celular, endereco, complemento, cidade, estado, cep, cod_vinc) values('$nome','$sobrenome', '$email','$senha', '$celular', '$endereco', '$complemento', '$cidade', '$estado', '$cep', '$cod_vinc')";

			//executar a query
			if(mysqli_query($link, $sql)){
				echo "Usuario registrado com Sucesso";
			} else{

				echo "Erro ao registrar Usuário";
			}
	}
	

	
	die();


}else{
	echo "Erro ao tentar localizar o registro de email";
}



//$senha1 = md5(substr(uniqid(rand()), 0, 6));



?>