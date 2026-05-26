<?php
session_start();
include 'conexaoBdd.php';


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}


if (isset($_GET['acao']) && $_GET['acao'] == 'add' && isset($_GET['id'])) { // Verificação tripla, o código so entra aqui se existe uma variavel acao na URL, o valor dessa acão é exatamente e existe um id do produto na URL
    $id = intval($_GET['id']);
    

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['qtd']++;
    } else {
        
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $resultado = $conn->query($sql);
        
        if ($resultado->num_rows > 0) {
            $produto = $resultado->fetch_assoc();
            $_SESSION['carrinho'][$id] = [
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'imagem' => $produto['imagem'],
                'qtd' => 1
            ];
        }
    }
 
    header("Location: Carrinho.php");
    exit;
}


if (isset($_GET['acao']) && $_GET['acao'] == 'remover' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]);
    }
    header("Location: Carrinho.php"); 
    exit;
}
?>

