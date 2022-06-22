<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verifica Informações</title>
</head>
<body>

	<?php

		$nome        = $_POST['nome'];
		$email       = $_POST['email'];
		$cidade      = $_POST['cidade'];
		$estado      = $_POST['uf'];
		$comentarios = $_POST['comentarios'];
		$vazio       = 0;

		if(empty($nome) or strstr($nome, ' ') == false){
			echo "<h2>Favor digitar um nome válido</h2>";
			$vazio = 1;
		}

		if(strstr($email, '@') == false or strlen($email) < 10){
			echo "<h2>Favor digitar um e-mail válido</h2>";
			$vazio = 1;
		}

		if(empty($cidade)){
			echo "<h2>Favor preencher o campo cidade</h2>";
			$vazio = 1;
		}

		if(strlen($estado) != 2){
			echo "<h2>Favor preencher o campo estado com um valor válido</h2>";
			$vazio = 1;
		}

		if(empty($comentarios)){
			echo "<h2>Favor preencher o campo comentários</h2>";
			$vazio = 1;
		}

		if($vazio == 0){
			include 'insere.inc';
		}




	?>

</body>
</html>