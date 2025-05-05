<?php
$host = 'localhost:3307'; // ou o endereço do seu servidor MySQL
$db = 'infrabanco';
$user = 'root'; // seu usuário do MySQL
$pass = 'senac'; // sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>