<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>
    <header>
      <div class="center">
        <h1>Programação Web II - Cadastro</h1>
        <a href="index.php">Inicial</a>
      </div>
    </header>
    <section id="produtos">
        <div class="center">
            <?php
                require_once("controller/conexao.php");
                $query = $mysqli->query("SELECT DESCRICAO FROM categoria");
                $lista_categorias = mysqli_fetch_row($query);
                var_dump($lista_categorias);
                
                
                echo '<select name="sexo">';
                foreach($lista_categorias as $item)
                {
                  echo '<option>' . $item . '</option>';
                }
                echo '</select>'
                
            ?>
        </div>
    </section>
  </body>
</html>

