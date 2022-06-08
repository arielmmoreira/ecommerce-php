<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <header>
      <div class="center">
        <h1>Programação Web II - Pedido de compra - By Anderson Macedo</h1>
        <a href="carrinho.php">Carrinho</a>
        <h1>Programação Web II - Pedido de compra - By Anderson Macedo</h1>
        <a href="cadastro-cliente.php">Cadastrar Cliente</a>
        <h1>Programação Web II - Pedido de compra - By Anderson Macedo</h1>
        <a href="cadastro-produto.php">Cadastrar Produto</a>
      </div>
    </header>
    <section id="produtos">
        <div class="center">
          <?php require_once('controller/produtos-busca.php'); ?>
        </div>
    </section>

  </body>
</html>
