<?php
    class Produtos {
        function buscar() {
            require_once('controller/conexao.php');

            $produtos = $mysqli->query("SELECT p.*, c.DESCRICAO as CATEGORIA, m.DESCRICAO as MARCA FROM produtos p INNER JOIN categoria c ON c.IDCATEGORIA = p.IDCATEGORIA INNER JOIN marca m ON m.IDMARCA = p.IDMARCA ORDER BY IDPROD DESC");
            $produtos = mysqli_fetch_all($produtos);

            if(count($produtos) > 0) {
                foreach($produtos as $prod) {
                    echo '<div class="col-12 col-md-6 col-lg-4">
                            <div class="produto-item">
                                <h2>' . $prod[3] . '</h2><p>' . $prod[4] . '</p>
                                <p><strong>Categoria: </strong>' . $prod[7] . '</p>
                                <p><strong>Marca: </strong>' . $prod[8] . '</p>
                                <p><strong>Estoque: </strong>' . $prod[5] . '</p>
                                <p><strong>Preço: </strong>R$' . str_replace('.',',',$prod[6]) . '</p>
                                <p><strong>Status: </strong>' . ($status = $prod[5] > 0 ? "Disponível" : "Indisponível").'</p>
                                <a id="adicionar" href="controller/carrinho-add.php?id=' . $prod[0] . '">Adicionar ao carrinho</a>
                                <div class="options">
                                    <button data-id="' . $prod[0] . '" data-type="produto" data-url="controller/ajax-excluir-produto.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAo0lEQVRIieWTTQqDMBCFP6xb7yg9Qo/SHik3qUgXFlxWqGI3WYQ4Jc5I0NIHswnM+5lH4F9wAXpg9tP7NzVcQGIdFxIWFhcJzBk4D4Yb9vtfYzKpg2aDucWuJHDPLbAlwcJc9gQSTsAbfcEjUMZkUoIJeKi9Q+tFkgJg60Hc+SZg6UHc2S3BIQVUJ7J0oDJVAQPr/8DL76hwBp4ryDug1pL/Dj5MW2BhteGWuAAAAABJRU5ErkJggg=="></button>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo '<p>Nenhum produto encontrado.</p>';
            }
        }

    function pedido() {
        require_once('../controller/conexao.php');

        if(!isset($_SESSION)) {
            session_start();
        }

        $pedido = $mysqli->query("INSERT INTO pedido(IDCLI, IDFOR, STATUS) VALUES (1,1,'E')");
        if ($pedido){
            $id = mysqli_insert_id($mysqli);
            $u = 1;
            for ($i=0; $i < max(array_keys($_SESSION['produtos'])); $i++) {
                if (@$_SESSION['produtos'][$i+1]){
                    $produto = $i+1;
                    $quantidade = $_SESSION['produtos'][$i+1];
                    //Adiciona produtos a tabela item pedido
                    $mysqli->query("INSERT INTO itempedido(IDPED, IDPROD, SEQ, QTDE) VALUES ($id, $produto, $u, $quantidade)");
                    $mysqli->query("UPDATE produtos SET ESTOQUE = ESTOQUE - $quantidade WHERE IDPROD = $produto");
                    $u++;
                }
            }
            unset($_SESSION['produtos']);

            header('location: ../pedido.php?pedido='.$id);
        } else {
            echo "Erro! Ocorreu um problema ao adicionar o pedido";
        }
    }

    function resumo(){
      if(!isset($_SESSION)) {
        session_start();
      }
      require_once('controller/conexao.php');

      if ($id = @$_GET['pedido']){
        $pedido = $mysqli->query("SELECT i.*,p.*,i.QTDE * p.PRECO AS TOTAL, c.DESCRICAO as CATEGORIA, m.DESCRICAO as MARCA FROM itempedido i INNER JOIN produtos p ON i.IDPROD = p.IDPROD INNER JOIN categoria c ON p.IDCATEGORIA = c.IDCATEGORIA INNER JOIN marca m ON m.IDMARCA = p.IDMARCA WHERE i.IDPED = $id");
        $total = 0;

        echo "<b>Pedido número: $id</b>";
        echo "<br/><br/>";
        while ($ped = mysqli_fetch_object($pedido)){
          echo "<p><strong>Nome:</strong> $ped->NOME</p>";
          echo "<p><strong>Descrição:</strong> $ped->DESCRICAO</p>";
          echo "<p><strong>Categoria:</strong> $ped->CATEGORIA</p>";
          echo "<p><strong>Marca:</strong> $ped->MARCA</p>";
          echo "<p><strong>Preço:</strong> R$".str_replace('.',',',$ped->PRECO)."</p>";
          echo "<p><strong>Quantidade:</strong> $ped->QTDE</p>";
          echo "<br>";
          $total += $ped->TOTAL;
        }
        echo "<b>Valor total: </b>";
        echo "<p>R$".str_replace('.',',',$total)."</p>";
        echo "<a class='btn-default' style='width: 300px;' href='/ecommerce-php'>Voltar ao início</a>";
      } else {
        echo "Nenhum pedido foi selecionado.";
        echo "<br/><br/>";
        echo "<a class='btn-default' style='width: 300px;' href='/ecommerce-php'>Voltar ao início</a>";
      }
    }

    function inserirProduto(){

      require_once('../controller/conexao.php');
      if(!isset($_SESSION)) {
        session_start();
      }

      $produto = $mysqli->query("INSERT INTO PRODUTOS (IDCATEGORIA,IDMARCA,IDPROD,DESCRICAO,ESTOQUE,NOME,PRECO) VALUES(1,1,3,'Computador Portátil',10,'Ultrabook',4000)");

      if($produto){
        $id = mysql_insert_id($mysqli);

        unset($_SESSION['produtos']);

        header('location:../pedido.php?pedido='.$id);

      }else
      {
        echo "Erro! Adicionar o produto";
      }
    }    
  }
?>