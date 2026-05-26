<?php
$host = "localhost";
$user = "root";     // Usuário padrão do XAMPP
$pass = "";         // Senha padrão vazia no XAMPP
$db   = "sportsgbg";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

