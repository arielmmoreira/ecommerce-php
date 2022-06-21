<header>
	<?php
		if(!isset($_SESSION)) {
			session_start();
		}
		$total = 0;
		if(isset($_SESSION['produtos']) && !empty($_SESSION['produtos'])) {
			foreach($_SESSION['produtos'] as $produto) {
				$total += $produto;
			}
		}
	?>
	<div class="container">
		<a href="<?php echo '/' . explode('/', $_SERVER['PHP_SELF'])[1]; ?>">
			<h1>E-commerce</h1>
		</a>
		<nav>
			<a href="cadastro-cliente.php">Cadastrar Cliente</a>
			<a href="cadastro-produto.php">Cadastrar Produto</a>
			<a href="carrinho.php">Carrinho
				<?php if($total > 0) { ?>
					<span class="counter"><?php echo $total; ?></span>
				<?php } ?>
			</a>
		</nav>
	</div>
</header>