<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
    <link rel="stylesheet" href="./css/cadastro-evento.css">
</head>
<body>
    <main>
        <div class="container-form" id="cadastro-evento">
            <form class="formulario" action="processa-evento.php" method="POST" enctype="multipart/form-data"> 
                <h1>Cadastrar Evento</h1>

                <div class="form-group">
                    <img src="./img/titulo.png" alt="" class="img">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" required>
                </div>

                <div class="form-group">
                    <img src="./img/data.png" alt="" class="img">
                    <label for="data_evento">Data do Evento:</label>
                    <input type="date" name="data_evento" required>
                </div>

                <div class="form-group">
                    <img src="./img/descricao.png" alt="" class="img">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <img src="./img/imagem.png" alt="" class="img">
                    <label for="imagem">Imagem:</label>
                    <input type="file" name="imagem" accept="image/*" required>
                </div>

                <button type="submit" class="btn">Cadastrar Evento</button>
            </form>
        </div>
    </main>

    <?php
    if (isset($_SESSION['msg_sucesso'])) {
        echo "<div class='mensagem sucesso' style='margin-top: 20px;'>{$_SESSION['msg_sucesso']}</div>";
        unset($_SESSION['msg_sucesso']);
    }

    if (isset($_SESSION['msg_erro'])) {
        echo "<div class='mensagem erro' style='margin-top: 20px;'>{$_SESSION['msg_erro']}</div>";
        unset($_SESSION['msg_erro']);
    }
    ?>
</body>
</html>
