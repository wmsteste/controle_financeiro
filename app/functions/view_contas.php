<?php 
$tipo = $_POST['tipo'];


<form method="POST" id="form-pesquisa" action="home.php?page=view_contas">
    <label>Pesquisar</label>
    <input type="text" name="tipo" id="pesquisa" placeholder="Pesquisar">
    <button class="btn btn-outline-success">Pesquisar</button>
</form>


  

  

  $sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir FROM contas WHERE tipo='$tipo' ";

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
$table .= '<th scope="col">Descrição</th>';
$table .= '<th scope="col">Fixo</th>';
$table .= '<th scope="col">Dividir</th>';
$table .= '<th scope="col">Id usuario</th>';
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
$table .= "<td>{$dados_usuario['descricao']}</td>";
$table .= "<td>{$dados_usuario['fixo']}</td>";
$table .= "<td>{$dados_usuario['dividir']}</td>";
$table .= "<td>{$dados_usuario['id_usuario']}</td>";
$table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
$table .= "<td><button type='button' class='btn btn-danger'>Excluir</button></td>";
$table .= "</tr>";
$table .= "</thead>";
$table .= "</tbody>";

  }
  echo $table;
  ?>
  
    </div>
</body>
 	
