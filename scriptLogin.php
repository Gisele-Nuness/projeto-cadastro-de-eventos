<?php
include 'conexao.php'; // Incluindo a conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $usuario = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Verifica se os campos estão preenchidos
    if (empty($usuario) || empty($senha)) {
        $mensagem = "Preencha todos os campos.";
    } else {
        // Cria um hash seguro da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Prepara e executa a inserção no banco
        try {
            $comando = "INSERT INTO tbusuario (emailUsuario, senhaUsuario) VALUES (?, ?)";
            $s = $con->prepare($comando);
            $s->bindParam(1, $usuario);
            $s->bindParam(2, $senha_hash);

            if ($s->execute()) {
                $mensagem = "Cadastro realizado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar: " . $s->errorInfo()[2];
            }

            $s = null; // Fecha a instrução
        } catch (PDOException $e) {
            $mensagem = "Erro ao cadastrar: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/mensagem.css">

    <?php if (isset($mensagem)): ?>
    <script>
        setTimeout(function () {
            window.location.href = "login.html";
        }, 3000);
    </script>
    <?php endif; ?>
</head>
<body>

<?php
// Exibe a mensagem com a classe CSS apropriada
if (isset($mensagem)) {
    $classe = (str_contains($mensagem, 'Erro') || str_contains($mensagem, 'erro')) ? 'mensagem erro' : 'mensagem';
    echo "<div class=\"$classe\">$mensagem<br>Você será redirecionado para a tela de login em instantes...</div>";
}
?>

</body>
</html>
