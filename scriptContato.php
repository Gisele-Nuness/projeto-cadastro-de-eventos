<?php
// Conectar ao banco de dados
include 'conexao.php';

// Verificando se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtendo os dados do formulário
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Inserir os dados no banco de dados
    try {
        // Comando para inserir os dados na tabela
        $comando = "INSERT INTO tbContato (nome, cnpj, telefone, email) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($comando);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cnpj);
        $stmt->bindParam(3, $telefone);
        $stmt->bindParam(4, $email);

        // Executando o comando
        $stmt->execute();

        // Mensagem de sucesso e redirecionamento
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Contato Enviado</title>
            <link rel='stylesheet' type='text/css' href='./css/scriptContato.css'>
        </head>
        <body>
            <div class='message'>
                <h1>Mensagem enviada com sucesso!</h1>
                <p>Você será redirecionado para a página principal em 3 segundos.</p>
                <p class='timer' id='countdown'>3</p>
            </div>
            <script>
                let countdown = 3;
                let timer = setInterval(function() {
                    countdown--;
                    document.getElementById('countdown').textContent = countdown;
                    if (countdown === 0) {
                        clearInterval(timer);
                        window.location.href = 'index.html';
                    }
                }, 1000);
            </script>
        </body>
        </html>";

    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>
