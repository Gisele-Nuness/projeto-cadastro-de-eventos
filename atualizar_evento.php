<?php
session_start(); // Inicia a sessão para controle de usuário
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
  header('Location: login.php'); // Redireciona para a página de login se não estiver logado
  exit();
}

$id = $_GET['id']; // Armazena o ID do evento
$usuario = $_SESSION['usuario']; // Armazena o usuário logado

$mensagem_sucesso = ''; // Variável para guardar mensagem de sucesso

// Verifica se o ID do evento foi passado via GET
if (!isset($_GET['id'])) {
  echo "ID do evento não fornecido."; // Mensagem de erro se não houver ID
  exit;
}

// Busca o evento no banco para o usuário logado, com o ID informado
$stmt = $con->prepare("SELECT * FROM tbeventos e 
    INNER JOIN tbusuario u ON e.idUsuario = u.idUsuario 
    WHERE e.idEvento = ? AND u.emailUsuario = ?");
$stmt->execute([$id, $usuario]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o evento não existir ou não pertencer ao usuário
if (!$evento) {
  echo "Evento não encontrado ou você não tem permissão para editá-lo.";
  exit;
}

// Se o formulário for submetido (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo']; // Recebe título do formulário
  $data_evento = $_POST['data_evento']; // Recebe data do formulário
  $descricao = $_POST['descricao']; // Recebe descrição do formulário
  $imagem_atual = $evento['imagem']; // Pega o nome da imagem atual do evento

  // Verifica se uma nova imagem foi enviada e não houve erro no upload
  if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
    // Define as extensões permitidas para a imagem
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
    // Extrai a extensão do arquivo enviado, convertendo para minúscula
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));

    // Se a extensão não for permitida
    if (!in_array($extensao, $extensoes_permitidas)) {
      echo "Tipo de arquivo inválido."; // Mostra erro
      exit;
    }

    // Gera um nome único para a nova imagem
    $novo_nome = uniqid('img_') . '.' . $extensao;
    $caminho = 'uploads/' . $novo_nome; // Define o caminho onde a imagem será salva

    // Move a imagem temporária para a pasta uploads
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
      // Se existir uma imagem anterior, remove o arquivo antigo do servidor
      if (!empty($imagem_atual) && file_exists('uploads/' . $imagem_atual)) {
        unlink('uploads/' . $imagem_atual);
      }
      $imagem_final = $novo_nome; // Define a nova imagem para salvar no banco
    } else {
      echo "Erro ao fazer upload da nova imagem."; // Caso não consiga mover o arquivo
      exit;
    }
  } else {
    $imagem_final = $imagem_atual; // Caso nenhuma nova imagem seja enviada, mantém a antiga
  }

  // Atualiza os dados do evento no banco
  $stmt = $con->prepare("UPDATE tbeventos SET titulo = ?, data_evento = ?, descricao = ?, imagem = ? 
    WHERE idEvento = ? AND idUsuario = (
        SELECT idUsuario FROM tbusuario WHERE emailUsuario = ?
    )");
  $stmt->execute([$titulo, $data_evento, $descricao, $imagem_final, $id, $usuario]);

  $mensagem_sucesso = "Evento atualizado com sucesso!"; // Mensagem para o usuário

  // Atualiza a variável $evento para exibir as alterações no formulário
  $stmt = $con->prepare("SELECT * FROM tbeventos e 
    INNER JOIN tbusuario u ON e.idUsuario = u.idUsuario 
    WHERE e.idEvento = ? AND u.emailUsuario = ?");
  $stmt->execute([$id, $usuario]);
  $evento = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <title>Atualizar Evento</title>
  <link rel="stylesheet" href="css/atualizar.css" />
  <!-- Inclusão de bibliotecas de ícones Font Awesome e Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <?php if ($mensagem_sucesso) : ?>
    <script>
      // Redireciona para dashboard.php após 3 segundos, após sucesso na atualização
      setTimeout(() => {
        window.location.href = 'dashboard.html';
      }, 3000);
    </script>
  <?php endif; ?>
</head>

<body>
  <div class="container">
    <h2>Atualizar Evento</h2>

    <!--Se a variável $mensagem_sucesso não estiver vazia, executa o bloco a seguir-->
    <?php if ($mensagem_sucesso) : ?>

      <!-- Exibe mensagem de sucesso, protegendo contra injeção  (htmlspecialchars)-->
      <div class="mensagem-sucesso"><?= htmlspecialchars($mensagem_sucesso) ?></div>
    <?php endif; ?>

    <!-- Formulário para atualizar evento, permite envio de arquivo (imagem) -->
    <form method="POST" enctype="multipart/form-data">
      <label for="titulo">Título:</label>
      <!-- Campo de texto para título, preenchido com o valor atual do evento -->
      <input type="text" name="titulo" value="<?= htmlspecialchars($evento['titulo']) ?>" required />

      <label for="data_evento">Data:</label>
      <!-- Campo para data do evento -->
      <input type="date" name="data_evento" value="<?= $evento['data_evento'] ?>" required />

      <label for="descricao">Descrição:</label>
      <!-- Textarea para descrição do evento -->
      <textarea name="descricao" required><?= htmlspecialchars($evento['descricao']) ?></textarea>

      <label>Imagem atual:</label><br />
      <!-- Mostra a imagem atual do evento -->

      <div class="imagem">
        <img src="uploads/<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem atual" style="max-width: 200px;" /><br /><br />
      </div>

      <label for="imagem" class="custom-file-label">Escolher nova imagem (opcional):</label>

      <!-- Input para envio de nova imagem -->
      <input type="file" name="imagem" accept="image/*" id="inputImagem" />


      <!-- Botão para salvar alterações -->
      <!--botao com icone do font awesome -->
      <div class="button">
        <button type="submit" class="btn-salvar"><i class="fas fa-save" style="margin-right: 8px;"></i> Salvar</button>

        <!-- Link para voltar à dashboard -->
        <a href="dashboard.html" class="btn-salvar" style="text-decoration: none;">
          <i class="bi bi-arrow-left-circle" style="margin-right: 8px;"></i> Voltar à Dashboard
        </a>
      </div>
    </form>
  </div>
</body>

</html>