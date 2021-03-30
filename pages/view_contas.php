<?php
if (!isset($_SESSION['nome'])) {
  header('Location: ../index.php?erro=1');
 }
 
  $tipo = $_POST['tipo'];
  $cod_vinc = $_SESSION['cod_vinc'];
  $data = date('m')+1;

if ($tipo == "TODOS") {
  $sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir,situacao FROM contas WHERE dividir='1' AND cod_vinc = '$cod_vinc' AND MONTH(data_para)='$data'";

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
  $table .= '<th scope="col">Situação</th>';
  $table .= '<th scope="col">Editar</th>';
  $table .= '<th scope="col">Excluir</th>';
  $table .= '</tr>';
  $table .= '</thead>';
  $table .= '<tbody>';

  while ($dados_usuario=mysqli_fetch_array($resultado_id)) {
if ($dados_usuario['situacao']=="sim") {
  $table .= "<tr>";
  $table .= "<th>{$dados_usuario['id_conta']}</th>";
  $table .= "<td>{$dados_usuario['empresa']}</td>";
  $table .= "<td>R$ {$dados_usuario['valor']}</td>";
  $table .= "<td>{$dados_usuario['tipo']}</td>";
  $table .= "<td>{$dados_usuario['fixo']}</td>";
  $table .= "<td>{$dados_usuario['descricao']}</td>";
  $table .= "<td>{$dados_usuario['nome']}</td>";
  $table .= "<td><strong>Paga</strong></td>";
  $table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
  $table .= "<td><a href='../app/functions/apague_conta.php?id_conta={$dados_usuario['id_conta']}&id_form=1'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
  $table .= "</tr>";
  $table .= "</thead>";
  $table .= "</tbody>";
}else {
  $table .= "<tr>";
  $table .= "<th>{$dados_usuario['id_conta']}</th>";
  $table .= "<td>{$dados_usuario['empresa']}</td>";
  $table .= "<td>R$ {$dados_usuario['valor']}</td>";
  $table .= "<td>{$dados_usuario['tipo']}</td>";
  $table .= "<td>{$dados_usuario['fixo']}</td>";
  $table .= "<td>{$dados_usuario['descricao']}</td>";
  $table .= "<td>{$dados_usuario['nome']}</td>";
  $table .= "<td><a href='../app/functions/updateConta.php?id_conta={$dados_usuario['id_conta']}&id_form=1'><button type='button' class='btn btn-danger'>Pagar</button></td>";
  $table .= "<td><button type='button' class='btn btn-primary'>Editar</button></td>";
  $table .= "<td><a href='../app/functions/apague_conta.php?id_conta={$dados_usuario['id_conta']}'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
  $table .= "</tr>";
  $table .= "</thead>";
  $table .= "</tbody>";
}

  }
}else{
  $sql = " SELECT id_usuario, id_conta, nome, empresa, valor, tipo, descricao, fixo, dividir FROM contas WHERE cod_vinc ='$cod_vinc' AND tipo='$tipo' AND dividir='1' ";

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $resultado_id = mysqli_query($link, $sql);

  $table  = '<table class="table table-bordered table-hover">';
  $table .= '<thead class="thead-dark">';
  $table .= '<tr>';
  $table .= '<th scope="col" col-sm-2>ID CONTA</th>';
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
  $table .= "<td><a href='../app/functions/apague_conta.php?id_conta={$dados_usuario['id_conta']}'><button type='button' class='btn btn-danger'>Excluir</button></a></td>";
  $table .= "</tr>";
  $table .= "</thead>";
  $table .= "</tbody>";

  }
 }
  ?>
  <div>
  <h4>Contas Compartilhadas</h4>
  <form method="POST" id="form-pesquisa" action="home.php?page=view_contas">
    <div class="input-group col-5">
  <select class="form-select" name="tipo" id="tipo" aria-label="Example select with button addon">
    <option selected=""> Selecione</option>
        <option>APARTAMENTO</option>
        <option>TELEFONIA</option>
        <option>LUZ</option>
        <option>AGUA</option>
        <option>INTERNET</option>
        <option>CARTÃO</option>
        <option>OUTROS</option>
        <option>TODOS</option>
        
  </select>
  <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
</div>
</form>
   <div><?= $table ?></div>

</div>