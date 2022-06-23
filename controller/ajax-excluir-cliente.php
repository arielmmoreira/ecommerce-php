<?php
	require_once("conexao.php");
	
	$id = $_GET["id"];

	if(empty($id) || !isset($id) || $id == 0) {
		
		$resposta = array(
			"status" => "error",
			"msg"    => "Cliente não encontrado.",
		);
	} else {
		$mysqli->query("DELETE FROM `cliente` WHERE idcli = $id");
		$resposta = array(
			"status" => "success",
			"msg"    => "Cliente excluído com sucesso.",
		);
	}

	echo json_encode($resposta);
?>