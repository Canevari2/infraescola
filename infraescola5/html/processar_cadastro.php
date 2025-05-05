<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");
    
    if ($stmt->execute([$nome, $email, $cpf, $senha])) {
        echo "Cadastro realizado com sucesso!";
        header("Location: login.html");
    } else {
        echo "Erro ao cadastrar.";
    }
}
?>
