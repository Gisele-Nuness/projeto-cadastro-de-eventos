<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT * FROM tbusuario WHERE emailUsuario = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    //var_dump($user);

    if ($user && password_verify($senha, $user['senhaUsuario'])) {
        $_SESSION['usuario'] = $user['emailUsuario'];
        $_SESSION['idUsuario'] = $user['idUsuario'];
        header("Location: painel.php"); // redireciona direto!
        exit();
    } else {
        header("Location: login.html?erro=1"); // pode mostrar erro com JS
        exit();
    }
}
?>
