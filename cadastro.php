<?php

include "conexao.php";

$nome = $_POST['nomeAluno'];
$matricula = $_POST['matriculaAluno'];
$id_curso = $_POST['id_curso'];
$id_serie = $_POST['id_serie'];

$select_turma = mysqli_query($conn, "SELECT id_turma FROM turmas WHERE id_curso = '$id_curso' AND id_serie = '$id_serie'");

$rows_turma = mysqli_num_rows($select_turma);

if ($rows_turma > 0) {

    $result_turma = mysqli_fetch_assoc($select_turma);
    $id_turma = $result_turma['id_turma'];

    $insert_aluno = mysqli_query($conn, "INSERT INTO alunos (nome, matricula, id_turma) VALUES ('$nome', '$matricula', '$id_turma')");     

    header("Location: dashboard.php?process=true");

    } else {

    $insert_turma = mysqli_query($conn, "INSERT INTO turmas (id_curso, id_serie) VALUES ('$id_curso', '$id_serie')");
    $select_turma = mysqli_query($conn, "SELECT id_turma FROM turmas WHERE id_curso = '$id_curso' AND id_serie = '$id_serie'");

    $result_turma = mysqli_fetch_assoc($select_turma);
    $id_turma = $result_turma['id_turma'];
    $insert_aluno = mysqli_query($conn, "INSERT INTO alunos (nome, matricula, id_turma) VALUES ('$nome', '$matricula', '$id_turma')");     

    header("Location: dashboard.php?process=true");

}





?>