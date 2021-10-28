<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>EXEMPLO</title>
</head>
<body>
<div align="center">
<h1>UPLOAD DE ARQUIVO</h1>

<form method="POST" action="envia2.php" enctype="multipart/form-data">
<input type="file" name="arquivo" />
<input type="submit" name="Enviar" value="Enviar" />
</form>	
	
</div>
<br>
<div align="center">
<p>
<?php
if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'])
{
      echo ($_SESSION['mensagem']);
      unset($_SESSION['mensagem']);
}
?>	
</p>

</div>
	
</body>
</html>
