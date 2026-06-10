<?php
session_start();
// echo "<pre>";
// var_dump($_POST);
// exit();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dashboard.php?process=false");
    exit();
}

// ID guardado para atualizar o numero de autorizações do aluno
$id_aluno = $_POST['id'];

// Dado para a tabela de autorizações
$tipo = $_POST['tipo_autorizacao'];

// Dados pra impressão do comprovante
$_SESSION['curso'] = $_POST['curso'];
$_SESSION['serie'] = $_POST['serie'];
$_SESSION['obs'] = $observacao = !empty($_POST['obs']) ? $_POST['obs'] : "Sem observação";
$_SESSION['nome'] = $nome = $_POST['aluno'];

// Dados de horários
$_SESSION['entrada'] = $entrada = $_POST['horario_entrada'] ?? "00:00";
$_SESSION['saida'] = $saida = $_POST['horario_saida'] ?? "00:00";

include "conexao.php";

$id_usuario = $_SESSION['id_usuario'] ?? null;
$data_emissao = date("Y-m-d H:i:s");

$insert_autorizacao = mysqli_query($conn, "INSERT INTO autorizacoes (id_aluno, id_usuario, tipo, observacao, entrada, saida, data_emissao) VALUES ('$id_aluno', '$id_usuario', '$tipo', '$observacao', '$entrada', '$saida', '$data_emissao')");

if (!$insert_autorizacao) {
    header("Location: dashboard.php?process=false");
    exit();

} else {
    // Atualiza o numero de autorizações do aluno
    $update_aluno = mysqli_query($conn, "UPDATE alunos SET num_autorizacoes = num_autorizacoes + 1 WHERE id_aluno = '$id_aluno'");      

    if (!$update_aluno) {
        header("Location: dashboard.php?process=false");
        exit();

    } else {
        header("Location: dashboard.php?process=true");

        include "print/comprovante.php";
        exit();

    }
}

