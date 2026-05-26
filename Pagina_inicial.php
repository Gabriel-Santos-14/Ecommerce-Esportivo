
<?php include 'conexaoBdd.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports GBG</title>
    <link rel="stylesheet" href="ecommerce.css">
</head>
<body>

    <div class="header"> 
        <a href="Pagina_inicial.php"> <img src="https://i.ibb.co/3mLyKP2B/GBG.png" alt="Logo GBG" border="0" width="100" height="100"></a>
        <h1>Sports GBG</h1>
    </div>

    <div class="topnav"> 
        <a href="Pagina_inicial.php">Página Inicial</a>
        <a href="Lista.php">Todos os Produtos</a>
        <a href="Carrinho.php">Carrinho</a>
        <a href="contato.html">Fale Conosco</a>
    </div>

    <div class="container"> 
        <div class="column"> 
            <main>
                <h2>Produtos em Destaque</h2>
                <div class="lista-produtos">
                    
                    <?php
                    // Dentro da tabela produtos criamos uma coluna (destaque), se o valor dessa coluna for = 1, esse produto é pra ser destacado.
                    
                    $sql = "SELECT * FROM produtos WHERE destaque = 1";
                    $resultado = $conn->query($sql); // Utilizamos a variavel resultado para enviar o comando que esta contido dentro da variavel SQL para o banco.
                    
                    if ($resultado->num_rows > 0) {
                        while($row = $resultado->fetch_assoc()) { // Utilizamos o fetch_assoc para realizar uma associação entre o banco e o PHP.
                            
                            $preco = number_format($row['preco'], 2, ',', '.'); // Formatação do ponto para a virgula
                            
                            // Classe produto define a borda e estilo com base no .produto no arquivo ecommerce.
                            // Dentro do echo substituimos a origem (src) pelo link da imagem que virá do bdd.
                            echo " 
                            <div class='produto'> 
                                <a href='#'><img src='{$row['imagem']}' alt='{$row['nome']}'/></a>
                                <h3>{$row['nome']}</h3>
                                <h4> R$ {$preco} </h4>
                                <p>{$row['descricao']}</p>
                                <a href='carrinho_acoes.php?acao=add&id={$row['id']}'>Adicionar ao carrinho</a>
                            </div>";
                        }
                    } else {
                        echo "<p>Nenhum produto em destaque no momento.</p>";
                    }
                    ?>

                </div> 
                <hr>
                <div id="noticiadestaque">
                    <h2>Na compra de 3 camisas a terceira sai pela metade do preço</h2>
                    <h3>Promoção de Black Friday se aproximando!</h3>
                    <p>Aproveite os descontos de até 30% em produtos selecionados. A promoção é válida somente até o final do mês. Não perca!</p>
                </div>
            </main>
        </div>
    </div> 
    
    <div class="footer"> 
        <p>Desenvolvido por: Bernardo França, Gabriel Augusto e Gabriel Carrieri</p>
        <p>Informações de Contato: 31 548168415</p>
        <p>E-mail: suporte@gbgsports.com</p>
    </div>

</body>
</html>