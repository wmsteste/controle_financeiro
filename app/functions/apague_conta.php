<?php
 require '../db.class.php';

 $apague = $_GET['id_conta'];
 
 $usuario = $_GET['id_usuario'];  

 $button2 = "<a href= http://localhost/controle_financeiro/app/home.php?page=view_contas2><button>SIM</button></a>";
 $button1 = "<a href= http://localhost/controle_financeiro/app/home.php?page=view_contas><button>SIM</button></a>";
$botao ="<a href= http://localhost/controle_financeiro/app/home.php?pages=inicio ><button>NÃO</button></a>";
if ($usuario == "") {

	$sql=" DELETE FROM contas WHERE id_conta='$apague' ";
	$objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
	echo "<h2>Conta apagada da com Sucesso</h2>";
	echo "<br><br><br>";
	echo "<h3>Apagar Nova Conta?</h3>";
echo $button1.' '. $botao  ;
	echo "primeiro IF";

} else{
	echo "Erro ao excluir conta";
	echo $botao;
}
}else{
  $sql=" DELETE FROM contas WHERE id_usuario='$usuario' AND id_conta='$apague' ";
  
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
	echo "<h2>Conta apagada da com Sucesso</h2>";
	echo "<br><br><br>";
	echo "<h3>Apagar Nova Conta?</h3>";
echo $button2.' '. $botao  ;
	echo "Else";

} else{
	echo "Erro ao excluir conta";
	echo $botao;
}
}
?>