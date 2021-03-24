<?php
 $tipo = $_POST['tipo'];
 
$usuario = $_SESSION['id_usuario'];  

  $sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir FROM contas WHERE id_usuario='$usuario' AND dividir='0' AND tipo='$tipo' ";

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

$table  = '<table class="table table-bordered table-hover">';
$table .= '<thead class="thead-dark">';
$table .= '<tr>';
$table .= '<th scope="col">ID CONTA</th>';
$table .= '<th scope="col">Empresa</th>';
$table .= '<th scope="col">Valor</th>';
$table .= '<th scope="col">Tipo</th>';
$table .= '<th scope="col">Fixo</th>';
$table .= '<th scope="col">Descrição</th>';
$table .= '<th scope="col">Cadastro feito por</th>';
$table .= '<th scope="col">Editar</th>';
$table .= '<th scope="col">Excluir</th>';
$table .= '</tr>';
$table .= '</thead>';
$table .= '<tbody>';

  while ($dados_usuario=mysqli_fetch_array($resultado_id)) {
$table .= "<tr>";
$table .= "<th>{$dados_usuario['id_conta']}</th>";
$table .= "<td>{$dados_usuario['empresa']}</td>";
$table .= "<td>{$dados_usuario['valor']}</td>";
$table .= "<td>{$dados_usuario['tipo']}</td>";
$table .= "<td>{$dados_usuario['fixo']}</td>";
$table .= "<td>{$dados_usuario['descricao']}</td>";
$table .= "<td>{$dados_usuario['nome']}</td>";
$table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
$table .= "<td><button type='button' class='btn btn-danger'>Excluir</button></td>";
$table .= "</tr>";
$table .= "</thead>";
$table .= "</tbody>";

  }
 
  ?>
  <h4>Contas Pessoais</h4>
  <form method="POST" id="form-pesquisa" action="home.php?page=view_contas2">
    <label>Pesquisar</label>
    <input type="text" name="tipo" id="tipo" placeholder="Pesquisar">
    <button class="btn btn-outline-success">Pesquisar</button>
</form>
   <div><?= $table ?></div>

