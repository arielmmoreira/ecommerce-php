<?php
    class Carrinho {

        function __construct() {
        //Inicia a sessão
            if(!isset($_SESSION)) {
                session_start();
            }
        }

        function add() {
            require_once("../controller/conexao.php");
            // Checa para ver se existe algum produto selecionado
            if ($id = @$_GET['id']){
                $produtos = $mysqli->query("SELECT * FROM produtos WHERE IDPROD = $id");

<<<<<<< HEAD
            if ($quantidade = @$_GET['qnt']){
            if ($prod = mysqli_fetch_object($produtos)){
                if (@$_SESSION['produtos']){
                // Se existir um produto ele checa se este produto já está na sessão
                    if (@$_SESSION['produtos'][$id]){
                    // Se ele estiver na sessão, soma a quantidade já existente com a quantidade adicionada para comparar com o estoque
                    $qnt = $_SESSION['produtos'][$id] + $quantidade;
                    // Ele checa se a quantidade em estoque é compatível com a quantidade selecionada
                    if ($qnt > 0 && $qnt <= $prod->ESTOQUE){
                        // Se a quantidade for compatível ele adiciona ao carrinho
                        $_SESSION['produtos'][$id] += $quantidade;
                        $resposta = array(
                            "status" => "success"
                        );
                    } else {
                        $resposta = array(
                            "status" => "error",
                            "msg"    => "a quantidade deve ser compatível ao estoque."
                          );
                        // Se a quantidade não for compatível ele retorna erro

                       echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
                        exit;
                    }
                    } else {
                    // Se não existir um produto ele checa se a quantidade de estoque é compatível
                    if ($quantidade > 0 && $quantidade <= $prod->ESTOQUE){
                        $_SESSION['produtos'][$id] = $quantidade;
                        $resposta = array(
                            "status" => "success"
                        );
                    } else {
                        $resposta = array(
                            "status" => "error",
                            "msg"    => "a quantidade deve ser compatível ao estoque."
                          );
                        // Se a quantidade não for compatível ele retorna erro
                        echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
                        exit;
                    }
                    }
                } else {
                // Se não existir nenhum produto ele cria um novo array na sessão e adiciona a quantidade
                if ($quantidade > 0 && $quantidade <= $prod->ESTOQUE){
                    $_SESSION['produtos'] = array();
                    $_SESSION['produtos'][$id] = $quantidade;
                    $resposta = array(
                        "status" => "success"
                    );
                } else {
                    $resposta = array(
                        "status" => "error",
                        "msg"    => "a quantidade deve ser compatível ao estoque."
                      );
                    // Se a quantidade não for compatível ele retorna erro
                    echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
=======
                if ($quantidade = @$_GET['qnt']) {
                    if ($prod = mysqli_fetch_object($produtos)) {
                        if (@$_SESSION['produtos']){
                            // Se existir um produto ele checa se este produto já está na sessão
                            if (@$_SESSION['produtos'][$id]){
                                // Se ele estiver na sessão, soma a quantidade já existente com a quantidade adicionada para comparar com o estoque
                                $qnt = $_SESSION['produtos'][$id] + $quantidade;
                                // Ele checa se a quantidade em estoque é compatível com a quantidade selecionada
                                if ($qnt > 0 && $qnt <= $prod->ESTOQUE){
                                    // Se a quantidade for compatível ele adiciona ao carrinho
                                    $_SESSION['produtos'][$id] += $quantidade;
                                } else {
                                    // Se a quantidade não for compatível ele retorna erro
                                    echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
                                    exit;
                                }
                            } else {
                                // Se não existir um produto ele checa se a quantidade de estoque é compatível
                                if ($quantidade > 0 && $quantidade <= $prod->ESTOQUE){
                                    $_SESSION['produtos'][$id] = $quantidade;
                                } else {
                                    // Se a quantidade não for compatível ele retorna erro
                                    echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
                                    exit;
                                }
                            }
                        } else {
                            // Se não existir nenhum produto ele cria um novo array na sessão e adiciona a quantidade
                            if ($quantidade > 0 && $quantidade <= $prod->ESTOQUE){
                                $_SESSION['produtos'] = array();
                                $_SESSION['produtos'][$id] = $quantidade;
                            } else {
                                // Se a quantidade não for compatível ele retorna erro
                                echo 'Erro, a quantidade deve ser compatível ao estoque </br><a href="../index.php">Voltar</a>';
                                exit;
                            }
                        }
                    }
                } else {
                    echo 'Erro, nenhuma quantidade foi definida </br><a href="../index.php">Voltar</a>';
>>>>>>> 54a63f6157e4c1e39312fbcc232863a443dbc672
                    exit;
                }
            } else {
<<<<<<< HEAD
                $resposta = array(
                    "status" => "error",
                    "msg"    => "a quantidade deve ser compatível ao estoque."
                  );
            echo 'Erro, nenhuma quantidade foi definida </br><a href="../index.php">Voltar</a>';
            exit;
            }
        } else {
            $resposta = array(
                "status" => "error",
                "msg"    => "a quantidade deve ser compatível ao estoque."
              );
            echo 'Erro, nenhum produto foi selecionado </br><a href="../index.php">Voltar</a>';
            exit;
        }
        // Redireciona para a inicial
        //echo json_encode($resposta);
        
        header('location: ../index.php');
    }
=======
                echo 'Erro, nenhum produto foi selecionado </br><a href="../index.php">Voltar</a>';
                exit;
            }
            // Redireciona para a inicial
            header('location: ../index.php');
        }
>>>>>>> 54a63f6157e4c1e39312fbcc232863a443dbc672

        function buscar() {
            require_once('controller/conexao.php');

            if (@$_SESSION['produtos']) {
                // Cria um loop para encontrar os produtos adicionados
                for ($i=0; $i < max(array_keys($_SESSION['produtos'])); $i++) {
                    if (@$_SESSION['produtos'][$i+1]) {
                        $quantidade = $_SESSION['produtos'][$i+1];
                        $produto = $mysqli->query("SELECT p.*, c.DESCRICAO as CATEGORIA, m.DESCRICAO as MARCA FROM produtos p INNER JOIN categoria c ON c.IDCATEGORIA = p.IDCATEGORIA INNER JOIN marca m ON m.IDMARCA = p.IDMARCA WHERE IDPROD = ($i+1)");
                        if ($prod = mysqli_fetch_object($produto)){
                            $preco = str_replace('.',',',$prod->PRECO);
                            $valortotal = str_replace('.',',', ($quantidade * $prod->PRECO));
                            echo '<div class="col-12">
                                    <div class="carrinho-item">
                                        <div class="data">
                                            <h3>'.$prod->NOME.'</h3>
                                            <p class="desc">' . $prod->DESCRICAO . '</p>
                                            <hr />
                                            <p><strong>Categoria: </strong>' . $prod->CATEGORIA . '</p>
                                            <p><strong>Marca: </strong>' . $prod->MARCA . '</p>
                                            <p><strong>Estoque: </strong>' . $prod->ESTOQUE . '</p>
                                            <p><strong>Preço: </strong>R$' . $preco . '</p>
                                            <p><strong>Quantidade: </strong>' . $quantidade . '</p>
                                            <p><strong>Valor total: </strong>R$' . $valortotal . '</p>
                                        </div>
                                        <div class="options">
                                            <button data-id="' . $prod->IDPROD . '" data-type="carrinho" data-url="controller/ajax-remover-carrinho.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAo0lEQVRIieWTTQqDMBCFP6xb7yg9Qo/SHik3qUgXFlxWqGI3WYQ4Jc5I0NIHswnM+5lH4F9wAXpg9tP7NzVcQGIdFxIWFhcJzBk4D4Yb9vtfYzKpg2aDucWuJHDPLbAlwcJc9gQSTsAbfcEjUMZkUoIJeKi9Q+tFkgJg60Hc+SZg6UHc2S3BIQVUJ7J0oDJVAQPr/8DL76hwBp4ryDug1pL/Dj5MW2BhteGWuAAAAABJRU5ErkJggg=="></button>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                }
                echo '<div class="button-container col-12">
                        <a class="btn-default" href="controller/produtos-pedido.php">Finalizar pedido</a>
                    </div>';
            } else {
                echo '<p>Nenhum produto no carrinho.</p>';
            }
        }

<<<<<<< HEAD
    function remover() {
      // Checa para ver se existe algum produto selecionado
      if ($id = @$_GET['id']) {
        // Se estiver selecionado, ele remove o produto da sessão
        unset($_SESSION['produtos'][$id]);
        $resposta = array(
            "status" => "success"
        );

      } else {
        $resposta = array(
            "status" => "error",
            "msg"    => "Nenhum produto selecionado"
          );

        
      }

      echo json_encode($resposta);

      header('location: ../carrinho.php');
=======
        function remover() {
            // Checa para ver se existe algum produto selecionado
            if ($id = @$_GET['id']) {
                // Se estiver selecionado, ele remove o produto da sessão
                unset($_SESSION['produtos'][$id]);
            } else {
                echo '<p>Erro! Nenhum produto selecionado';
            }

            header('location: ../carrinho.php');
        }
>>>>>>> 54a63f6157e4c1e39312fbcc232863a443dbc672
    }
?>