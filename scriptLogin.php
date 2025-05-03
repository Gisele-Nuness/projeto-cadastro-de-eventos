<?php
session_start(); // Inicia a sessão (para manter o login)
include 'conexao.php'; // Arquivo de conexão com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        // Consulta o usuário pelo e-mail
        $comando = "SELECT * FROM tbusuario WHERE emailUsuario = ?";
        $stmt = $con->prepare($comando);
        $stmt->bindParam(1, $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senhaUsuario'])) {
            // Senha correta → cria sessão e redireciona
            $_SESSION['usuario'] = $usuario['emailUsuario'];

            echo "<script>
                alert('Login realizado com sucesso!');
                window.location.href = 'painel.html'; // Página após login
            </script>";
        } else {
            // Email ou senha inválidos
            echo "<script>
                alert('Email ou senha inválidos!');
                window.location.href = 'login.html';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
?>
