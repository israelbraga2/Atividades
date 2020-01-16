<?php
include('classes/usuario.class.php');

// Iniciar sessão
session_start();

// Pegar usuário logado
$usuarioLogado = $_SESSION["usuarioLogado"];
// Pegar id do usuário logado
$idUsuario = $usuarioLogado->id;

// Abrir conexão com banco
include ('conexao.php');
global $link;

// Pegar as tarefas selecionadas
$idTarefas = $_POST["tarefas"];
// Pegar o modo da ação: finalizar ou excluir ?
$modo = $_POST["modo"];

// Iniciar variáveis contadoras
$nSucesso = 0; // quantidade de tarefas finalizadas
$nErro = 0; // quantidade de tarefas com erro ao finalizar

// Loop para finalizar cada uma das tarefas
foreach ($idTarefas as $id) {
    
    if ($modo == "finalizar") {
        $sql = "UPDATE lista_tarefas.tarefa SET finalizada = true WHERE id = $id and id_usuario = $idUsuario";
    } else if ($modo == "excluir") {
        $sql = "DELETE FROM lista_tarefas.tarefa WHERE id = $id and id_usuario = $idUsuario";
    }
    
    // Enviar comando
    $resultado = mysqli_query($link, $sql);
    
    // Verificar se comando foi executado com sucesso
    if ($resultado && mysqli_affected_rows($link) > 0) {
        $nSucesso ++;
    } else {
        $nErro ++;
    }
}

$_SESSION["msgProcessar"] = "<p>$nSucesso tarefas modificadas com sucesso</p>" . "<p>Erros: $nErro</p>";
header("Location: home.php");