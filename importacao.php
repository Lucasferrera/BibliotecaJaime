<?php 

include("conexao.php");

if (($handle = fopen($_FILES['arquivo_csv']['tmp_name'], 'r')) !== false) {

    // Ignora o cabeçalho
    //fgetcsv($handle, 1000, ',');

    $importacao = true;

    while (($dados = fgetcsv($handle, 1000, ',')) !== false) {
        
        $matricula = $dados[0];
        $nome = $dados[1];
        $id_serie = $dados[2];
        $id_curso = $dados[3];
		
		//echo $matricula.'|'.$nome.'|'.$id_serie.'|'.$id_curso;
		//echo "<hr>";
		
          $select_turma = mysqli_query($conn, "SELECT id_turma FROM turmas WHERE id_curso = '$id_curso' AND id_serie = '$id_serie'");

          $result_turma = mysqli_fetch_assoc($select_turma);

          $id_turma = $result_turma['id_turma'];

          $insert_aluno = mysqli_query($conn, "INSERT INTO alunos (nome, matricula, id_turma) VALUES ('$nome', '$matricula', '$id_turma')");     

          }

     //    mysqli_query($conn, "INSERT INTO alunos (
     //            matricula,
     //            aluno,
     //            id_serie,
	// 			id_curso
     //        ) VALUES (
     //            '$matricula',
     //            '$aluno',
     //            '$id_serie',
     //            '$id_curso'
     //        )");
		
    fclose($handle);
    mysqli_close($conn);

    // Redireciona com resultado
    if ($importacao === true) {

        header("Location: dashboard.php?process=true");

    } else {

        header("Location: dashboard.php?process=false");
        
    }

} else {
    mysqli_close($conn);

    header("Location: dashboard.php?process=false");
}

