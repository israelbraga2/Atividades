<?php
include("classes/Usuario.php");
include("conexao.php");
global $link;
session_start();
if (isset($_SESSION["usuarioLogado"])) {
    $usuario = $_SESSION["usuarioLogado"];
} else {
    header("Location: index.php");
    exit();
}
$id = $_GET["id"];
$resultado = mysqli_query($link, "UPDATE lista_tarefas.tarefa SET finalizada = 1 WHERE id = {$id} and id_usuario = {$usuario->id}");
if ($resultado) {
    
    $linhasAlteradas = mysqli_affected_rows($link);
    
    if ($linhasAlteradas > 0) {
        // Tarefa finalizada com sucesso
        $msg = "Tarefa finalizada com sucesso!";
    } else {
        // Erro ao finalizar tarefa
        $msg = "Erro ao finalizar tarefa. Tente Novamente";
    }
    
} else {
    // Erro ao finalizar tarefa
    $msg = "Erro ao finalizar tarefa. Tente Novamente";
}
$_SESSION['msgFinalizar'] = $msg;
header("Location: home.php");
exit();
