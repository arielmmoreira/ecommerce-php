<?php
	require_once("conexao.php");
	
	$id = $_GET["id"];

	if(!isset($_SESSION)) {
		session_start();
	}

	if(empty($id) || !isset($id) || $id == 0) {
		$resposta = array(
			"status" => "error",
			"msg"    => "Produto não encontrado.",
		);
	} else {
		// Se estiver selecionado, ele remove o produto da sessão
		unset($_SESSION['produtos'][$id]);

		$total = 0;
		if(isset($_SESSION['produtos']) && !empty($_SESSION['produtos'])) {
			foreach($_SESSION['produtos'] as $produto) {
				$total += $produto;
			}
		}

		$resposta = array(
			"status"   	  => "success",
			"msg"      	  => "Produto excluído com sucesso.",
			"carrinhoQtd" => $total,
		);
	}

	echo json_encode($resposta);
?>