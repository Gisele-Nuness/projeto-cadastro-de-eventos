<?php
// Conectar ao banco de dados
include 'conexao.php';

// Verificando se o formulário foi enviado e se o arquivo foi carregado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

    // Obtendo os dados do formulário
    $titulo = $_POST['titulo'];
    $data = $_POST['data_evento'];
    $descricao = $_POST['descricao'];
   // $usuario = '';
    

    // Processando a foto
    $foto = $_FILES['imagem'];
    $foto_nome = $foto['name'];
    $foto_temp = $foto['tmp_name'];
    $foto_tamanho = $foto['size'];
    $foto_erro = $foto['error'];

    // Validando se a foto tem um tipo de arquivo correto (imagem)
    $extensao = pathinfo($foto_nome, PATHINFO_EXTENSION);
    $extensao = strtolower($extensao); // Convertendo para minúsculo

    // Definindo as extensões permitidas
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

    // Se a extensão não for válida, não envia o arquivo
    if (!in_array($extensao, $extensoes_permitidas)) {
        echo "Erro: Tipo de arquivo inválido. Apenas imagens JPG, JPEG, PNG e GIF são permitidas.";
        exit;
    }

    // Definindo o caminho da pasta de uploads
    $pasta_upload = 'uploads/';

    // Verificando o último arquivo de foto para gerar o próximo número sequencial
    $contador = 1;

    // Verificando se já existe uma foto com o mesmo nome
    // Loop para encontrar o próximo nome disponível
    while (file_exists($pasta_upload . "imagem" . $contador . "." . $extensao)) {
        $contador++;
    }

    // Gerando o nome único da foto (foto1, foto2, ...)
    $novo_nome_foto = "imagem" . $contador . '.' . $extensao;
    $caminho_foto = $pasta_upload . $novo_nome_foto;

    // Movendo o arquivo para o diretório de uploads
    if (move_uploaded_file($foto_temp, $caminho_foto)) {
        // Inserir os dados no banco de dados
        try {
            // Comando para inserir os dados na tabela
            $comando = "INSERT INTO tbeventos (titulo, data_evento, descricao, imagem) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($comando);
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $data);
            $stmt->bindParam(3, $descricao);
            $stmt->bindParam(4, $novo_nome_foto);// Salvando o nome da foto no banco
    

            // Executando o comando
            $stmt->execute();

            echo "<!DOCTYPE html>
            <html lang='pt-BR'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Evento cadastrado</title>
                <link rel='stylesheet' type='text/css' href='./css/scriptContato.css'>
            </head>
            <body>
                <div class='message'>
                    <h1>Evento cadastrado com sucesso!</h1>
                    <p>Você será redirecionado para a Dashboard em 3 segundos.</p>
                    <p class='timer' id='countdown'>3</p>
                </div>
                <script>
                    let countdown = 3;
                    let timer = setInterval(function() {
                        countdown--;
                        document.getElementById('countdown').textContent = countdown;
                        if (countdown === 0) {
                            clearInterval(timer);
                            window.location.href = 'dashboard.html';
                        }
                    }, 1000);
                </script>
            </body>
            </html>";

        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    } else {
        echo "Erro ao fazer o upload da foto.";
    }
} else {
    echo "Nenhuma foto foi selecionada ou houve erro no upload.";
}
?>
