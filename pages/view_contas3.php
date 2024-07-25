<?php
if (!isset($_SESSION['nome'])) {
  header('Location: ../index.php?erro=1');

 }
$cod_vinc = $_SESSION['cod_vinc'];
 if ($_POST) {
   $data2=$_POST['data2'];
   $data1=$_POST['data1'];
 }
  ?>
  <div>
  <h4>Contas Compartilhadas</h4>
  <form method="POST" id="form-pesquisa" action="home.php?page=view_contas3">
    <div class="input-group col-5">
  <input type="date" class="input-group" name="data1"> <input type="date" class="input-group" name="data2">
  <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
</div>
</form>

   <div><?= Pesq_Mes($link,$data1,$data2,$cod_vinc); ?></div>

</div>