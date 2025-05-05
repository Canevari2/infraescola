<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE user_name='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $row['user_name'];
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.html?error=Nome de usuário ou senha incorretos");
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}