<?php
require_once('app/db.class.php');




$objDb = new db();
$link = $objDb->conecta_mysql();


$email_existe = false;

function verifica($email){
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
            echo "Esse email ja existe";
            die();
};
}
    
?>

<script>alert("<?PHP data; ?>");</script>
<html>
    <body>

        <input type="text" id="campo" />

        <div id="campoDoCalculo">
        </div> 
        <script>
            var texto = document.getElementById("campo");
            var campoDoCalculo = document.getElementById("campoDoCalculo")

            //evento dispara quando retira o foco do campo texto
            texto.onblur = function(){
              $.ajax({
                    method: "post",
                    url: "app/registra_usuario.php",
                    data: $("#form").serialize(),
                success: function(data){
                           alert(data);
                        }

                    });

                campoDoCalculo.innerHTML = "<p>"+texto.value+"</p>";
               <?php echo 'verifica(texto.value)'; ?>
            }
        </script>
       
    </body>
</html>