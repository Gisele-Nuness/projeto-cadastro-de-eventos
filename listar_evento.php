<?php
session_start(); // Inicia a sessão para manter dados do usuário

include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado, se não estiver redireciona para login.php
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario']; // Recupera o nome do usuário logado

// Prepara a consulta para selecionar todos os eventos do usuário logado
$stmt = $con->prepare("SELECT e.*
FROM tbeventos e
INNER JOIN tbusuario u ON e.idUsuario = u.idUsuario
WHERE u.emailUsuario = ?");
$stmt->execute([$usuario]); // Executa a consulta passando o usuário como parâmetro

// Busca todos os resultados da consulta em um array associativo
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8"> <!-- Define o charset para português -->
  <title>Meus Eventos</title> <!-- Título da página -->
  <link rel="stylesheet" href="css/listar.css"> <!-- Link para arquivo CSS -->
</head>
<body>
  <div class="container"><!-- Container principal da página -->
    <h2>Meus Eventos</h2> <!-- Cabeçalho da página -->

    <?php if (count($eventos) > 0): ?> <!-- Verifica se existem eventos cadastrados -->
      <div class="cards-container"> <!-- Container para os cards dos eventos -->
        <?php foreach ($eventos as $evento): ?> <!-- Loop para mostrar cada evento -->
          <div class="card"> <!-- Card individual de evento -->
            <!-- Exibe a imagem do evento com proteção contra injeção de HTML -->
            <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do Evento" class="card-img">
            <div class="card-content"> <!-- Conteúdo do card -->
              <h3><?= htmlspecialchars($evento['titulo']) ?></h3> <!-- Título do evento -->
              <p><strong>Data:</strong> <?= $evento['data_evento'] ?></p> <!-- Data do evento -->
              <p><?= htmlspecialchars($evento['descricao']) ?></p> <!-- Descrição do evento -->
              <!-- Link para editar o evento passando o id como parâmetro -->
              <div class="botoes">
                 <a href="atualizar_evento.php?id=<?= $evento['idEvento'] ?>" class="btn-edit">Editar</a>

                <form method="GET" action="excluir_evento.php" class="form-excluir">
                  <!-- Campo oculto contendo o id do evento para exclusão -->
                  <input type="hidden" name="id" value="<?= $evento['idEvento'] ?>" />
                  
                  <!-- Botão para enviar o formulário e excluir o evento -->
                  <button type="submit" class="btn-delete">Excluir</button>
                </form>

              </div>

            </div>
          </div>
        <?php endforeach; ?> <!-- Fim do loop -->
      </div>
    <?php else: ?> <!-- Caso não existam eventos -->
      <p>Você ainda não cadastrou nenhum evento.</p> <!-- Mensagem para usuário -->
    <?php endif; ?>
  </div>

  <script src="js/excluir.js"></script>
  
  <!-- Inclusão da biblioteca SweetAlert2 para alertas bonitos -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
