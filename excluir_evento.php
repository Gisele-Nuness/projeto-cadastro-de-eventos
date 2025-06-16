<?php
session_start(); // Inicia a sessão para controlar login e dados do usuário
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado, caso contrário redireciona para a página de login
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redireciona para login
    exit(); // Para a execução do script
}

$usuario = $_SESSION['usuario']; // Armazena o usuário logado na variável
$mensagem = ''; // Inicializa variável para mensagem de feedback
$tipo = ''; // Inicializa variável para tipo da mensagem ('sucesso' ou 'erro')

// Verifica se o ID do evento foi enviado via GET (formulário)
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Recebe o ID do evento enviado

    // Prepara a consulta para verificar se o evento pertence ao usuário logado
    $stmt = $con->prepare("SELECT * FROM tbeventos e 
        INNER JOIN tbusuario u ON e.idUsuario = u.idUsuario 
        WHERE e.idEvento = ? AND u.emailUsuario = ?");
    $stmt->execute([$id, $usuario]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($evento) { // Se o evento existe e pertence ao usuário
        // Verifica se há uma imagem associada e se o arquivo existe no servidor
        if (!empty($evento['imagem']) && file_exists('uploads/' . $evento['imagem'])) {
            unlink('uploads/' . $evento['imagem']); // Apaga o arquivo da imagem do evento
        }

        // Prepara a consulta para excluir o evento do banco
        $stmt = $con->prepare("DELETE FROM tbeventos WHERE idEvento = ?");
        $stmt->execute([$id]);

        $mensagem = "Evento excluído com sucesso!"; // Mensagem de sucesso
        $tipo = 'sucesso'; // Define o tipo como sucesso
    } else { // Caso o evento não pertença ao usuário ou não exista
        $mensagem = "Você não tem permissão para excluir este evento."; // Mensagem de erro
        $tipo = 'erro'; // Define o tipo como erro
    }
} else { // Se não foi enviado o ID do evento
    $mensagem = "ID do evento não fornecido."; // Mensagem de erro
    $tipo = 'erro'; // Define o tipo como erro
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"> <!-- Define a codificação de caracteres da página -->
  <title>Excluir Evento</title> <!-- Título da aba do navegador -->
  <link rel="stylesheet" href="css/excluir.css"> <!-- Link para o CSS externo que estiliza essa página -->
  <meta http-equiv="refresh" content="3;url=listar_evento.php"> <!-- Redireciona automaticamente para listar eventos após 3 segundos -->
</head>
<body>
  <div class="container"> <!-- Container principal para centralizar o conteúdo -->
    <div class="mensagem <?= $tipo ?>"> <!-- Div para exibir a mensagem, com classe dinâmica para estilo -->
      <h2><?= $mensagem ?></h2> <!-- Exibe a mensagem de sucesso ou erro -->
      <p>Redirecionando para a listagem de eventos...</p> <!-- Informação sobre o redirecionamento -->
    </div>
  </div>
</body>
</html>
