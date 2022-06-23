<?php
	require_once("conexao.php");
	
	$id = $_GET["id"];

	// $clientes = $mysqli->query('SELECT * FROM cliente WHERE id="' . $id . '"');
	// $clientes = mysqli_fetch_all($clientes);

	if(empty($id) || !isset($id) || $id == 0) {
		$resposta = array(
			"status" => "error",
			"msg"    => "Cliente não encontrado.",
		);
	} else {
		$resposta = array(
			"status" => "success",
			"msg"    => "Cliente excluído com sucesso.",
		);
	}

	echo json_encode($resposta);
?>