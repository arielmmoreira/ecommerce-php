<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Produtos</title>
	<link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<?php include_once('include/head.php'); ?>
</head>

<body>
	<header>
		<div class="container">
			<h1>E-commerce</h1>
			<nav>
				<a href="carrinho.php">Carrinho</a>
				<a href="cadastro-cliente.php">Cadastrar Cliente</a>
				<a href="cadastro-produto.php">Cadastrar Produto</a>
			</nav>
		</div>
	</header>
	<section id="produtos">
		<div class="container">
			<h2 class="title">Produtos</h2>
			<div class="row gy-4">
				<?php require_once('controller/produtos-busca.php'); ?>
			</div>
		</div>
	</section>
</body>

</html>