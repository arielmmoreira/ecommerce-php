<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section>
        <div class="center">
          <form method="GET" action="controller/ajax-cadastrar-cliente.php">
              Nome:                 <input type="text" name="nome">
              Login:                <input type="text" name="login">
              Senha:                <input type="password" name="senha">
              Data de Nascimento:   <input type="date" name="data">
              Endereço:             <input type="text" name="endereco">
              Sexo:                 <select name="sexo">
                                      <option value="masculino">Masculino</option>
                                      <option value="feminino">Feminino</option>
                                    </select>
              CPF:                  <input type="text" name="cpf">
              RG:                   <input type="text" name="rg">
              Telefone:             <input type="text" name="telefone">
              Celular:              <input type="text" name="celular">
              
                      <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
  </body>
</html>

