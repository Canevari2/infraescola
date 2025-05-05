<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);

 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'E-mail inválido. Por favor, insira um e-mail válido.';
        header('Location: login.php');
        exit;
    }

    
    if (strlen($senha) < 8) {
        $_SESSION['error'] = 'A senha deve ter no mínimo 8 caracteres.';
        header('Location: login.php');
        exit;
    }



    $usuario_valido_email = 'usuario@exemplo.com';
    $usuario_valido_senha = 'senha123'; 

    
    if ($email == $usuario_valido_email && $senha == $usuario_valido_senha) {
   
        $_SESSION['user_email'] = $email;
        header('Location: painel.php'); 
        exit;
    } else {

        $_SESSION['error'] = 'E-mail ou senha inválidos.';
        header('Location: login.php');
        exit;
    }
} else {

    header('Location: login.php');
    exit;
}
?>
