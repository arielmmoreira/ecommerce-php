<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Carrinho</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script defer type="text/javascript" src="js/script.js"></script>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section id="carrinho">
        <div class="container">
          <h2 class="title">Carrinho</h2>
          <div class="row gy-4">
            <?php require_once('controller/carrinho-busca.php'); ?>
          </div>
        </div>
    </section>
    <?php include_once('include/rodape.php'); ?>
  </body>
</html>
