<?php
require '../db.class.php';

$objDb = new db();
$link = $objDb->conecta_mysql();

	

$pesq_cont = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

 $sql = "SELECT id_conta,nome,empresa,valor,tipo,descricao,fixo,dividir FROM contas WHERE tipo = '$pesq_cont' ";

$result_pesq_cont = mysqli_query($link, $sql);

 $table ."<thead>";
 $table. "   <tr>";
 $table."     <th scope='col'>Id</th>";
 $table. "     <th scope='col'>Nome</th>";
$table. "     <th scope='col'>Empresa</th>";
 $table."     <th scope='col'>Valor</th>";
$table. "      <th scope='col'>Alterar</th>";
$table. "      <th scope='col'>Apagar</th>";
$table."    </tr>";
$table. "  </thead>";
$table."  <tbody>";

if (($result_pesq_cont) AND ($result_pesq_cont -> num_rows != 0)) {
	while ($row_cont = mysqli_fetch_assoc($result_pesq_cont)) {
		

			$table. "    <tr>";
			$table. "      <th scope='row'>1</th>";
			$table. "      <td>".$row_cont['id_conta']."</td>";
			$table."      <td>".$row_cont['empresa']."</td>";
			$table. "      <td>".$row_cont['valor']."</td>";
			$table. "      <td>".$row_cont['id_conta']."</td>";
			$table. "      <td>".$row_cont['id_conta']."</td>";
			$table. "      <td>".$row_cont['id_conta']."</td>";
			$table."    </tr>";

	}
$table. "  </tbody>";
$table."</table>";
echo $table;
}
else{
	echo "Conta não encontrada";
}

?>