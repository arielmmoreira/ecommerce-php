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
        "status" => "erro no preenchimento do campo"
    );
      break;
    }
  }

  if ($verifica == 0)
  {
    $mysqli->query("INSERT INTO cliente(NOME, `LOGIN`, SENHA, DTNASC, ENDERECO, SEXO, CPF, RG, TELEFONE, CELULAR) 
    VALUES ('$nome', '$login','$senha','$data','$endereco', '$sexo_indb','$cpf','$rg','$telefone','$celular')");

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
