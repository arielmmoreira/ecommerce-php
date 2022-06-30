<!DOCTYPE html>
<html>
  <head>
    <title>Cadastrar novo cliente</title>
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
                  <input type="text" placeholder="Nome" name="nome" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Login</label>
                  <input type="text" placeholder="Login" name="login" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Senha</label>
                  <input type="password" placeholder="Senha" name="senha" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Data de nascimento</label>
                  <input type="date" placeholder="Data de nascimento" name="data" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Endereço</label>
                  <input type="text" placeholder="Endereço" name="endereco" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Sexo</label>
                  <div class="select-wrapper">
                    <select name="sexo" required>
                      <option value="masculino">Masculino</option>
                      <option value="feminino">Feminino</option>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>CPF</label>
                  <input type="text" placeholder="CPF" name="cpf" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>RG</label>
                  <input type="text" placeholder="RG" name="rg" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Telefone</label>
                  <input type="text" placeholder="Telefone" name="telefone" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Celular</label>
                  <input type="text" placeholder="Celular" name="celular" required>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <button class="btn-full" type="submit" data-loading-text="Cadastrando...">Cadastrar</button>
                </div>
              </div>
            </form>
        </div>
    </section>
    <?php include_once('include/rodape.php'); ?>
  </body>
</html>

