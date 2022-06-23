<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script defer type="text/javascript" src="js/script.js"></script>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section>
        <div class="container cadastro">
          <h2 class="title">Novo cliente</h2>
          <form method="GET" action="controller/ajax-cadastrar-cliente.php">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Nome</label>
                  <input type="text" placeholder="Nome" name="nome">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Login</label>
                  <input type="text" placeholder="Login" name="login">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Senha</label>
                  <input type="password" placeholder="Senha" name="senha">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Data de nascimento</label>
                  <input type="date" placeholder="Data de nascimento" name="data">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Endereço</label>
                  <input type="text" placeholder="Endereço" name="endereco">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Sexo</label>
                  <div class="select-wrapper">
                    <select name="sexo">
                      <option value="masculino">Masculino</option>
                      <option value="feminino">Feminino</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>CPF</label>
                  <input type="text" placeholder="CPF" name="cpf">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>RG</label>
                  <input type="text" placeholder="RG" name="rg">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Telefone</label>
                  <input type="text" placeholder="Telefone" name="telefone">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Celular</label>
                  <input type="text" placeholder="Celular" name="celular">
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <button type="submit">Enviar</button>
                </div>
              </div>
            </form>
        </div>
    </section>
    <?php include_once('include/rodape.php'); ?>
  </body>
</html>

