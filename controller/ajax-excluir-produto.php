<?php
	require_once("conexao.php");
	
	$id = $_GET["id"];

	if(empty($id) || !isset($id) || $id == 0) {
		$resposta = array(
			"status" => "error",
			"msg"    => "Produto não encontrado.",
		);
	} else {
		$mysqli->query("DELETE FROM `itempedido` WHERE idprod = $id");
		$mysqli->query("DELETE FROM `produtos` WHERE idprod = $id");
		$resposta = array(
			"status" => "success",
			"msg"    => "Produto excluído com sucesso.",
		);
	}

	echo json_encode($resposta);
?>