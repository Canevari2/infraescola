<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['usuario_id'])) {
        echo "Você precisa estar logado para fazer uma denúncia.";
        exit;
    }

    $descricao = $_POST['feedback']; 


    $stmt = $pdo->prepare("INSERT INTO denuncias (usuario_id, descricao) VALUES (?, ?)");
    
    if ($stmt->execute([$_SESSION['usuario_id'], $descricao])) {
        echo "Denúncia registrada com sucesso!";
        header("Location: index.html");
    } else {
        echo "Erro ao registrar a denúncia.";
    }
}
?>