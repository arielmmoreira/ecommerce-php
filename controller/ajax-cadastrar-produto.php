<?php
  require_once("conexao.php");

  $nome = $_GET["nome"];
  $descricao = $_GET["descricao"];
  $estoque = $_GET["estoque"];
  $preco = $_GET["preco"];
  $categoria = $_GET["categoria"];
  $marca = $_GET["marca"];

  $lista = array($nome, $descricao, $estoque, $preco, $categoria, $marca);

  

  $verifica = 0;
  foreach ($lista as $item) {
    if (empty($item))
    {
      $verifica = 1;
      $resposta = array(
        "status" => "erro no preenchimento do campo"
    );
      break;
    }
  }

  if ($verifica == 0)
  {
    $idMarca = $mysqli->query("SELECT IDMARCA FROM `marca` WHERE DESCRICAO = '$marca'");
    $idMarca = mysqli_fetch_all($idMarca);

    $idCategoria = $mysqli->query("SELECT IDCATEGORIA FROM `categoria` WHERE DESCRICAO = '$categoria'");
    $idCategoria = mysqli_fetch_all($idCategoria);

    if(empty($idMarca))
    {
      $mysqli->query("INSERT INTO `marca`(`DESCRICAO`) VALUES ('$marca')");
      $idMarca = $mysqli->query("SELECT IDMARCA FROM `marca` WHERE DESCRICAO = '$marca'");
      $idMarca = mysqli_fetch_all($idMarca);
    }
    if (empty($idCategoria))
    {
      $mysqli->query("INSERT INTO `categoria`(`DESCRICAO`) VALUES ('$categoria')");
      $idCategoria = $mysqli->query("SELECT IDCATEGORIA FROM `categoria` WHERE DESCRICAO = '$categoria'");
      $idCategoria = mysqli_fetch_all($idCategoria);
    }

    $idCategoria = $idCategoria[0][0];
    $idMarca = $idMarca[0][0];

    $mysqli->query("INSERT INTO `produtos`(`IDCATEGORIA`, `IDMARCA`, `NOME`, `DESCRICAO`, `ESTOQUE`, `PRECO`) 
    VALUES ('$idCategoria','$idMarca','$nome','$descricao', $estoque, $preco)");

    $resposta = array(
        "status" => "sucesso"
    );
  }
  else
  {
    $resposta = array(
        "status" => "erro na conexão com o banco"
    );
  }

  echo json_encode($resposta);
   
?>
