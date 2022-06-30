<!DOCTYPE html>
<html>

<head>
	<title>Produtos</title>
	<?php include_once('include/head.php'); ?>
</head>

<body>
	<?php include_once('include/topo.php'); ?>
	<section id="produtos">
		<div class="container">
			<div class="d-flex justify-content-between">
				<h2 class="title">Produtos</h2>
				<a class="subpage-link" href="cadastro-produto.php">Novo produto</a>
			</div>
			<div class="row gy-4">
				<?php require_once('controller/produtos-busca.php'); ?>
			</div>
		</div>
	</section>
	<?php include_once('include/rodape.php'); ?>
</body>

</html>