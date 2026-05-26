<?php 
session_start(); 
// Guarda os dados do carrinho na memoria
if(!isset($_SESSION['carrinho'])) { // !isset significa que os dados que ficarão na sessão não estão definidos
    $_SESSION['carrinho'] = []; 
}
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - SportsGBG </title>
    <link rel="stylesheet" href="ecommerce.css"> 
</head>
<body>

    <div class="header">
        <a href="Pagina_inicial.php"><img src="https://i.ibb.co/3mLyKP2B/GBG.png" alt="Logo GBG" border="0" width="100" height="100"></a>
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
                <h2> Carrinho de Compras</h2>
                <p>Produtos selecionados</p>

                <?php
                $total = 0; // Criação de uma variavel total garantindo que o valor sempre será iniciado em 0
                
                if (empty($_SESSION['carrinho'])) { // verifica se a sessão esta vazia
                    echo "<p>Seu carrinho está vazio.</p>";
                } else {
                    foreach($_SESSION['carrinho'] as $id => $item) { // foreach para cada produto que estiver
                        $subtotal = $item['preco'] * $item['qtd'];
                        $total += $subtotal;
                        $precoFormatado = number_format($item['preco'], 2, ',', '.');
                        
                        echo "
                        <div class='carrinho-item'> 
                            <h3> {$item['nome']} </h3>
                            <p>Quantidade: {$item['qtd']}</p>
                            <p>Preço Unitário: R$ {$precoFormatado}</p>
                            <a href='carrinho_acoes.php?acao=remover&id={$id}' style='color:red; text-decoration:none; font-size:0.9em;'>[Remover Item]</a>
                        </div>";
                    }
                }
                
                $totalFormatado = number_format($total, 2, ',', '.');
                
                // Cálculos extras (exemplo do seu html original)
                $parcela = number_format($total / 6, 2, ',', '.');
                ?>

                <hr>

                <div class="carrinho-total"> 
                    <h3>Total: R$ <?php echo $totalFormatado; ?></h3>
                    <?php if($total > 0): ?>
                    <p><em> R$ <?php echo $totalFormatado; ?> no boleto e Pix, ou em até 6x de R$<?php echo $parcela; ?> sem juros.</em></p>
                    <?php endif; ?>
                </div>
                 
                <?php if($total > 0): ?>
                <button type="button" style="padding: 15px 25px; font-size: 18px; cursor: pointer; background-color: #28a745; color: white; border: none; border-radius: 5px; margin-top: 20px;">Finalizar Compra</button>
                <?php endif; ?>

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