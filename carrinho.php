<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Carrinho</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section id="produtos">
        <div class="container">
          <h2 class="title">Carrinho</h2>
          <?php require_once('controller/carrinho-busca.php'); ?>
        </div>
    </section>

  </body>
</html>
