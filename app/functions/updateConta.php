<?php
 require '../db.class.php';

 $id_conta = $_GET['id_conta'];
 
 //$usuario = $_GET['id_usuario']; 
 $pago = 'sim'; 
 $form = $_GET['id_form'];
 $button2 = "<a href= http://localhost/controle_financeiro/app/home.php?page=view_contas2><button>SIM</button></a>";
 $button1 = "<a href= http://localhost/controle_financeiro/app/home.php?page=view_contas><button>SIM</button></a>";
$botao ="<a href= http://localhost/controle_financeiro/app/home.php?pages=inicio ><button>NÃO</button></a>";
 if ($form == "2") {
   

  $sql=" UPDATE contas SET situacao='$pago' WHERE id_conta='$id_conta' ";
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
  echo "<h2>Conta Atualizada da com Sucesso</h2>";
  echo "<br><br><br>";
  echo "<h3>Atualizar Nova Conta?</h3>";
echo $button2.' '. $botao  ;

} else{
  echo "Erro ao atualizar Situação da conta";
  echo $botao;
}
}elseif($form=='1') {
  

  $sql=" UPDATE contas SET situacao='$pago' WHERE id_conta='$id_conta' ";
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

if(mysqli_query($link, $sql)){
  echo "<h2>Conta Atualizada da com Sucesso</h2>";
  echo "<br><br><br>";
  echo "<h3>Atualizar Nova Conta?</h3>";
echo $button1.' '. $botao  ;

} else{
  echo "Erro ao atualizar Situação da conta";
  echo $botao;
}
 
}

 

?>