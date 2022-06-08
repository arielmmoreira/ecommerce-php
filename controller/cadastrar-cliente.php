<?php
  require_once("../controller/conexao.php");

  $nome = $_POST["nome"];
  $login = $_POST["login"];
  $senha = $_POST["senha"];
  $data = $_POST["data"];
  $endereco = $_POST["endereco"];
  $sexo = $_POST["sexo"];
  $cpf = $_POST["cpf"];
  $rg = $_POST["rg"];
  $telefone = $_POST["telefone"];
  $celular = $_POST["celular"];

  $sexo_indb = 0;

  if ($sexo == "masculino")
  {
    $sexo_indb = 1;
  }
  else
  {
    $sexo_indb = 0;
  }
 
  $mysqli->query("INSERT INTO cliente(NOME, `LOGIN`, SENHA, DTNASC, ENDERECO, SEXO, CPF, RG, TELEFONE, CELULAR) 
  VALUES ('$nome', '$login','$senha','$data','$endereco', '$sexo_indb','$cpf','$rg','$telefone','$celular')");

  
?>
