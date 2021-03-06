<?php
  require_once("../controller/conexao.php");  

  $nome = $_GET["nome"];
  $login = $_GET["login"];
  $senha = $_GET["senha"];
  $data = $_GET["data"];
  $endereco = $_GET["endereco"];
  $sexo = $_GET["sexo"];
  $cpf = $_GET["cpf"];
  $rg = $_GET["rg"];
  $telefone = $_GET["telefone"];
  $celular = $_GET["celular"];

  $lista = array($nome, $login, $senha, $data, $endereco, $sexo, $cpf, $rg, $telefone, $celular);

  $sexo_indb = 0;

  if ($sexo == "masculino")
  {
    $sexo_indb = 1;
  }
  else
  {
    $sexo_indb = 0;
  }

  $verifica = 0;
  foreach ($lista as $item) {
    if (empty($item))
    {
      $verifica = 1;
      $resposta = array(
        "status" => "error",
        "msg"    => "Algum campo não foi preenchido corretamente.",
    );
      break;
    }
  }

  if ($verifica == 0)
  {
    $mysqli->query("INSERT INTO cliente(NOME, `LOGIN`, SENHA, DTNASC, ENDERECO, SEXO, CPF, RG, TELEFONE, CELULAR) 
    VALUES ('$nome', '$login','$senha','$data','$endereco', '$sexo_indb','$cpf','$rg','$telefone','$celular')");

    $resposta = array(
        "status" => "success",
        "msg" => "Novo cliente cadastrado com sucesso.",
    );
  }
  else
  {
    $resposta = array(
        "status" => "error",
        "msg"    => "Encontramos um problema ao se conectar ao banco de dados."
    );
  }

  echo json_encode($resposta);
?>