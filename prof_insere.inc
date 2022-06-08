<?php

	include 'conecta_mysql.inc';

	$nome        = $_POST['nome'];
	$email       = $_POST['email'];
	$cidade      = $_POST['cidade'];
	$estado      = $_POST['uf'];
	$comentarios = $_POST['comentarios'];

	$sql = "INSERT INTO CADASTRO VALUES";
	$sql .="('$nome','$email','$cidade','$estado','$comentarios')";

	if($conexao->query($sql) == TRUE){
		echo "<h1> Cliente inserido com sucesso !!!</h1>";
	}else{
		echo "<h2> Erro ao inserir o Cliente!!!</h2>";

	}

	$conexao->close();




?>
