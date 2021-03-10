<?php

session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['id_usuario']);

echo "Esperamos que volte em breve!!";
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aguarde um instante</title>
</head>
<body>
<script type="text/javascript">
	window.location.href='home.php';
</script>
</body>
</html>

