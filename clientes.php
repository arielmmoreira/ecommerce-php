<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Clientes</title>
	<link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
	<script defer type="text/javascript" src="js/script.js"></script>
	<?php include_once('include/head.php'); ?>
</head>

<body>
	<?php include_once('include/topo.php'); ?>
	<section id="produtos">
		<div class="container">
			<div class="d-flex justify-content-between">
				<h2 class="title">Clientes</h2>
				<a class="subpage-link" href="cadastro-cliente.php">Novo cliente</a>
			</div>
			
			<div class="row gy-4">
				<?php
					require_once("controller/conexao.php");

					$clientes = $mysqli->query("SELECT * FROM cliente");
					$clientes = mysqli_fetch_all($clientes);

					if(count($clientes) > 0) {
						foreach($clientes as $cliente)
						{
							$sexo = ($cliente[6] == 1) ? "Masculino" : "Feminino";
							echo
							'<div class="col-12">' .
							'	<div class="client-item">' .
							'		<div class="data">' .
							'			<h3>' . $cliente[1] . '</h3>' .
							'			<p><strong>Data de nascimento: </strong>' . date("d/m/Y", strtotime($cliente[4])) . '</p>' .
							'			<p><strong>Sexo: </strong>' . $sexo . '</p>' .
							'			<p><strong>Telefone: </strong>' . $cliente[9] . '</p>' .
							'			<p><strong>Celular: </strong>' . $cliente[10] . '</p>' .
							'		</div>' .
							'		<div class="options">' .
							'			<button data-id="' . $cliente[0] . '" data-url="controller/ajax-excluir-cliente.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAo0lEQVRIieWTTQqDMBCFP6xb7yg9Qo/SHik3qUgXFlxWqGI3WYQ4Jc5I0NIHswnM+5lH4F9wAXpg9tP7NzVcQGIdFxIWFhcJzBk4D4Yb9vtfYzKpg2aDucWuJHDPLbAlwcJc9gQSTsAbfcEjUMZkUoIJeKi9Q+tFkgJg60Hc+SZg6UHc2S3BIQVUJ7J0oDJVAQPr/8DL76hwBp4ryDug1pL/Dj5MW2BhteGWuAAAAABJRU5ErkJggg=="></button>' .
							'		</div>' .
							'	</div>' .
							'</div>';
						}
					} else {
						echo '<p>Nenhum cliente cadastrado.</p>';
					}
				?>
			</div>
		</div>
	</section>
	<?php include_once('include/rodape.php'); ?>
</body>

</html>