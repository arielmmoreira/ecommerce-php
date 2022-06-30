<!DOCTYPE html>
<html>
  <head>
    <title>Resumo do pedido</title>
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
    <?php include_once('include/rodape.php'); ?>
  </body>
</html>
