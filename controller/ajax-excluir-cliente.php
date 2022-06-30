<?php
	require_once("conexao.php");
	
	$id = $_GET["id"];

	if(empty($id) || !isset($id) || $id == 0) {
		
		$resposta = array(
			"status" => "error",
			"msg"    => "Cliente não encontrado.",
		);
	} else {
		$idcliente = $id;
		$idpedido = $mysqli->query("SELECT idped FROM `pedido` WHERE idcli = $idcliente");
		while ($idped = mysqli_fetch_object($idpedido))
		{
			$mysqli->query("DELETE  FROM `itempedido` WHERE idped = $idped->idped");
			$mysqli->query("DELETE FROM `pedido` WHERE `IDPED` = $idped->idped");
		}
		
		$mysqli->query("DELETE FROM `cliente` WHERE idcli = $idcliente");
		$resposta = array(
			"status" => "success",
			"msg"    => "Cliente excluído com sucesso.",
		);
	}

	echo json_encode($resposta);
?>