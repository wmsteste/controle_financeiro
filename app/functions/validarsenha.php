<?php
require 'db.class.php';
if ($_POST) {
	
$senha = $_POST['senha'];
$senhaconfirma = $_POST['senhaConfima'];
$id_usuario = $_POST['id'];

if ($senha!= $senhaconfima) {
	echo "As senhas não conferem";
}elseif ($senha === $senhaconfirma) {

  $sql=" UPDATE usuarios SET senha='$senha' WHERE id='$id_usuario' AND email='$email' ";
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
  echo "<h2>Senha Atualizada da com Sucesso</h2>";
  echo "<br><br><br>";
  
 echo $button2;

} else{
  echo "Erro ao atualizar Situação da conta";
  echo $botao;
}
}




}




?>