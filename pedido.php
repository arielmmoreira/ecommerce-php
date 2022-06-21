<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resumo de Pedido</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <?php include_once('include/head.php'); ?>
  </head>
  <body>
    <?php include_once('include/topo.php'); ?>
    <section id="produtos">
        <div class="center">
          <div>
            <?php require_once('controller/produtos-resumo.php'); ?>
          </div>
        </div>
    </section>

  </body>
</html>
