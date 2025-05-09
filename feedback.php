<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['feedback'])) {

        $feedback = htmlspecialchars($_POST['feedback']);
        

        echo "<h2>Obrigado pelo seu feedback!</h2>";
        echo "<p>Seu feedback foi registrado:</p>";
        echo "<blockquote>" . nl2br($feedback) . "</blockquote>";
        

         $conn = new mysqli('localhost', 'usuario', 'senha', 'banco_de_dados');
         if ($conn->connect_error) {
             die("Conexão falhou: " . $conn->connect_error);
         }
         $sql = "INSERT INTO feedbacks (feedback_text) VALUES ('$feedback')";
        if ($conn->query($sql) === TRUE) {
             echo "Feedback registrado com sucesso!";
         } else {
             echo "Erro ao registrar feedback: " . $conn->error;
        }
         $conn->close();
    } else {
        echo "<p>Por favor, forneça um feedback ou denúncia.</p>";
    }
} else {

    echo "<p>Erro: formulário não enviado.</p>";
}
?>
