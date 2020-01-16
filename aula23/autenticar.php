<?php
include ("classes/usuario.class.php");
include ("conexao.php");
global $link;

session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

$resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.usuario WHERE email = '$email' and senha = '$senha'");

if ($resultado && $resultado->num_rows == 1) {
    // Usuário Logado!

    $usuarioLogado = mysqli_fetch_object($resultado, 'Usuario');

    unset($_SESSION["erro_login"]);
    $_SESSION["usuarioLogado"] = $usuarioLogado;
    header("Location: home.php");
    exit();
}

$_SESSION["erro_login"] = "E-mail/senha inválidos";
header("Location: lista_tarefas.php");
mysqli_close($link);
