<?php include 'conexaoBdd.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Produtos - Sports GBG </title>
    <link rel="stylesheet" href="ecommerce.css">
</head>
<body>

    <div class="header">
        <a href="Pagina_inicial.php"><img src="https://i.ibb.co/3mLyKP2B/GBG.png" alt="Logo GBG" border="0" width="100" height="100"></a>
        <h1> Sports GBG </h1>
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
                <h2> Lista de Produtos</h2>

                <div class="lista-produtos"> 
                    <?php
                    // SQL para pegar TODOS os produtos
                    $sql = "SELECT * FROM produtos";
                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows > 0) {
                        while($row = $resultado->fetch_assoc()) {
                            $preco = number_format($row['preco'], 2, ',', '.');
                            echo "
                            <div class='produto'>
                                <a href='#'><img src='{$row['imagem']}' alt='{$row['nome']}'></a>
                                <h3>{$row['nome']}</h3>
                                <h4> R$ {$preco} </h4>
                                <p>{$row['descricao']}</p>
                                <a href='carrinho_acoes.php?acao=add&id={$row['id']}'>Adicionar ao carrinho</a>
                            </div>";
                        }
                    }
                    ?>
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