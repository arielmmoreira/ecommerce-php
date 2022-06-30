<!DOCTYPE html>
<html>
  <head>
    <title>Cadastrar novo produto</title>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section id="produtos">
    <div class="container cadastro">
          <h2 class="title">Novo produto</h2>
          <form method="GET" action="controller/ajax-cadastrar-produto.php">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Nome</label>
                  <input type="text" placeholder="Nome" name="nome" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Descrição</label>
                  <input type="text" placeholder="Descrição" name="descricao" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Estoque</label>
                  <input type="number" placeholder="Estoque" name="estoque" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Preço</label>
                  <input type="number" placeholder="Preço" name="preco" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Categoria</label>
                  <input type="text" placeholder="Selecione ou escreva para criar" name="categoria" list="categorias" autocomplete="off" required>
                  <datalist id="categorias">
                    <?php
                      require_once("controller/conexao.php");

                      $categorias = $mysqli->query("SELECT DESCRICAO FROM categoria");
                      $categorias = mysqli_fetch_all($categorias);

                      foreach($categorias as $categoria)
                      {
                        echo '<option>' . $categoria[0] . '</option>';
                      }
                    ?>
                  </datalist>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                  <label>Marca</label>
                  <input type="text" placeholder="Selecione ou escreva para criar" name="marca" list="marcas" autocomplete="off" required>
                  <datalist id="marcas">
                    <?php
                      require_once("controller/conexao.php");

                      $marcas = $mysqli->query("SELECT DESCRICAO FROM marca");
                      $marcas = mysqli_fetch_all($marcas);

                      foreach($marcas as $marca) {
                        echo '<option>' . $marca[0] . '</option>';
                      }
                    ?>
                  </datalist>
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

