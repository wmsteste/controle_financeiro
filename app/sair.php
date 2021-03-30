<?php

session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['id_usuario']);
unset($_SESSION['cod_vinc']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Aguarde um instante</title>
</head>
<body>
<script type="text/javascript">
	window.location.href='../index.php';
</script>
</body>
</html>

