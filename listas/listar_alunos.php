<?php
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<!-- TABLE USUÁRIOS -->
<div class="container">

    <!--
		<a href="relatorio.php?param=alunos" target="_blank">
			<button type="button" class="btn btn-outline-dark">
				<i class="bi bi-file-earmark-pdf"></i> Relatório
			</button>
          </a>
		<hr -->

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Curso</th>
                <th scope="col">Série</th>
                <th scope="col">Matrícula</th>
                <th scope="col">N° Autorizações</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php

            $select_alunos = mysqli_query($conn, "SELECT * FROM alunos ORDER BY id_turma,nome ASC");

            $num_rows = mysqli_num_rows($select_alunos);
            $contador_lista = 0;

            if ($num_rows == 0) {

                echo "<tr><td colspan='5'>Nenhum aluno encontrado.</td></tr>";

            } else {
    
                while ($contador_lista < $num_rows) {

                    $alunos = mysqli_fetch_assoc($select_alunos);

                    $turma_aluno = $alunos['id_turma'];

                    $select_turma = mysqli_query($conn, "SELECT id_curso, id_serie FROM turmas WHERE id_turma = $turma_aluno "); 

                    $result_turma = mysqli_fetch_assoc($select_turma);

                    $curso_aluno = $result_turma['id_curso'];
                    $serie_aluno = $result_turma['id_serie'];

                    $select_curso = mysqli_query($conn, "SELECT nome_curso FROM cursos WHERE id_curso = $curso_aluno");
                    $select_serie = mysqli_query($conn, "SELECT nome_serie FROM series WHERE id_serie = $serie_aluno");

                    $result_curso = mysqli_fetch_assoc($select_curso);
                    $result_serie = mysqli_fetch_assoc($select_serie);

                    $contador_lista++;

                ?>

                    <tr>
                        <td><?php echo $alunos['nome']; ?></td>
                        <td><?php echo $result_curso['nome_curso']; ?></td>
                        <td><?php echo $result_serie['nome_serie']; ?></td>
                        <td><?php echo $alunos['matricula']; ?></td>
                        <td><?php echo $alunos['num_autorizacoes']; ?></td>
                        
                        <td>

                            <!-- editarAlunoModal -->
                            <button type="button" class="btn btn-outline-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#alunoModal"
                                data-bs-curso="<?php echo $curso_aluno; ?>"
                                data-bs-serie="<?php echo $serie_aluno; ?>"
                                data-bs-id="<?php echo $alunos['id_aluno'] ?>"
                                data-bs-aluno="<?php echo $alunos['nome'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Modal Autorização -->
                            <button type="button" class="btn btn-outline-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#autorizacaoModal"
                                data-bs-curso="<?php echo $curso_aluno; ?>"
                                data-bs-serie="<?php echo $serie_aluno; ?>"
                                data-bs-id="<?php echo $alunos['id_aluno'] ?>"
                                data-bs-aluno="<?php echo $alunos['nome'] ?>">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </button>


                            <!-- excluirAlunoModal -->
                            <button type="button" class="btn btn-outline-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal"
                                data-bs-id="<?php echo $alunos['id_aluno'] ?>"
                                data-bs-aluno="<?php echo $alunos['nome'] ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>


</div>




<!-- Sucesso Modal-->
<div class="modal fade" id="sucessoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-check-lg"></i> Sucesso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Operação realizada com sucesso!
            </div>
        </div>
    </div>
</div>

<!-- Erro Modal-->
<div class="modal fade" id="erroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-lg mr-2"></i> Erro!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ocorreu um erro na operação!
            </div>
        </div>
    </div>
</div>

<!-- Modal AUTORIZAÇÕES -->
<div class="modal fade" id="autorizacaoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Autorizações</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="autorizacao.php">
                <div class="modal-body">
                    <input type="hidden" id="alunoId" name="id" required>
                    <input type="hidden" id="alunoCurso" name="curso" required>
                    <input type="hidden" id="alunoSerie" name="serie" required>

                    <!-- Campo Nome do Aluno -->
                    <div class="mb-3">
                        <label class="col-form-label">Nome do Aluno:</label>
                        <input type="text" class="form-control" id="nomeAluno" name="aluno" disabled>
                    </div>

                    <!-- Campo Observações -->
                    <div class="mb-3">
                        <label class="col-form-label">Observações:</label>
                        <textarea class="form-control" id="observacoes" name="obs" rows="3" placeholder="Descreva detalhes ou observações adicionais"></textarea>
                    </div>

                    <!-- Tipo de Autorização -->
                    <div class="mb-4">
                        <label class="form-label d-block">Tipo de Autorização:</label>
                        <div class="btn-group w-100 flex-wrap" role="group" aria-label="Tipo de autorização">
                            <input type="radio" class="btn-check" name="tipo_autorizacao" id="tipoAtraso" value="atraso_entrada" checked autocomplete="off" onchange="alternarCamposHorario()">
                            <label class="btn btn-outline-primary" for="tipoAtraso">Atraso / Entrada</label>

                            <input type="radio" class="btn-check" name="tipo_autorizacao" id="tipoSaida" value="saida" autocomplete="off" onchange="alternarCamposHorario()">
                            <label class="btn btn-outline-primary" for="tipoSaida">Saída</label>

                            <input type="radio" class="btn-check" name="tipo_autorizacao" id="tipoRetorno" value="saida_com_retorno" autocomplete="off" onchange="alternarCamposHorario()">
                            <label class="btn btn-outline-primary" for="tipoRetorno">Saída com Retorno</label>

                            <input type="radio" class="btn-check" name="tipo_autorizacao" id="tipoFardamento" value="fardamento_incompleto" autocomplete="off" onchange="alternarCamposHorario()">
                            <label class="btn btn-outline-primary" for="tipoFardamento">Fardamento Incompleto</label>

                            <input type="radio" class="btn-check" name="tipo_autorizacao"
                                id="tipoAlmoco" value="saida_almoco"
                                autocomplete="off" onchange="alternarCamposHorario()">
                            <label class="btn btn-outline-primary" for="tipoAlmoco">Saída para Almoço</label>
                        </div>
                    </div>

                    <!-- Seção de Horários Dinâmicos -->
                    <div class="row g-2">

                        <!-- Horário de Entrada / Atraso -->
                        <div class="col-md-6" id="containerEntrada">
                            <div class="mb-3">
                                <label for="horarioEntrada" class="form-label">Horário de Entrada:</label>
                                <input type="time" class="form-control" id="horarioEntrada" name="horario_entrada">
                            </div>
                        </div>

                        <!-- Horário Retorno -->
                        <div class="col-md-6" id="containerRetorno" style="display: none;">
                            <div class="mb-3">
                                <label for="horarioEntrada" class="form-label">Horário de Retorno:</label>
                                <input type="time" class="form-control" id="horarioRetorno" name="horario_retorno">
                            </div>
                        </div>
                        
                        
                        <!-- Horário de Saída -->
                        <div class="col-md-6" id="containerSaida" style="display: none;">
                            <div class="mb-3">
                                <label for="horarioSaida" class="form-label">Horário de Saída:</label>
                                <input type="time" class="form-control" id="horarioSaida" name="horario_saida">
                            </div>
                        </div>
                        <!-- Horário de saída para o almoço -->
                        <div class="col-md-6" id="containerAlmoco" style="display: none;">
                            <div class="mb-3">
                                <label for="saidaAlmoco" class="form-label">
                                    Horário de Saída para Almoço:
                                </label>
                                <input type="time"
                                    class="form-control"
                                    id="saidaAlmoco"
                                    name="saida_almoco">
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Imprimir</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal EDITAR -->
<div class="modal fade" id="alunoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alunoModal">Editar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="editar.php?edit=usuario">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="id" required>
                    <div class="mb-3">
                        <label class="col-form-label">Nome do Aluno:</label>
                        <input type="text" class="form-control" id="editarAluno" name="aluno" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="col-form-label">Senha:</label>
                        <input type="password" class="form-control" id="userPassword" name="senha">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal EXCLUIR -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="excluir.php?delete=usuario">
                <div class="modal-body">
                    <input type="hidden" id="deleteUserId" name="id" required>
                    Deseja excluir este usuário?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    var confirmDeleteModal = document.getElementById('confirmDeleteModal')
    console.log("MODAL: ", confirmDeleteModal)
    confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
        console.log("EVENTO: ", event);

        var button = event.relatedTarget
        console.log("BUTTON: ", button);

        var id = button.getAttribute('data-bs-id');
        console.log("ID: ", id);
        document.getElementById("deleteUserId").value = id;

        var usuario = button.getAttribute('data-bs-aluno');
        console.log("USUÁRIO: ", usuario);

        var modalTitle = confirmDeleteModal.querySelector('.modal-title')
        modalTitle.textContent = 'Excluir ' + usuario

    })
</script>

<script type="text/javascript">
    var alunoModal = document.getElementById('alunoModal');
    if (alunoModal) {
        alunoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');
            document.getElementById('userId').value = id;

            var aluno = button.getAttribute('data-bs-aluno');
            document.getElementById('editarAluno').value = aluno;
        });
    }
</script>

<script type="text/javascript">
    
    var autorizacaoModal = document.getElementById('autorizacaoModal')
    console.log("MODAL: ", autorizacaoModal)
    autorizacaoModal.addEventListener('show.bs.modal', function(event) {
        console.log("EVENTO: ", event);

        var button = event.relatedTarget
        console.log("BUTTON: ", button);

        var id = button.getAttribute('data-bs-id');
        console.log("ID: ", id);
        document.getElementById("alunoId").value = id;

        var curso = button.getAttribute('data-bs-curso');
        console.log("CURSO: ", curso);
        document.getElementById("alunoCurso").value = curso;

        var serie = button.getAttribute('data-bs-serie');
        console.log("SÉRIE: ", serie);
        document.getElementById("alunoSerie").value = serie;

        var aluno = button.getAttribute('data-bs-aluno');
        console.log("ALUNO: ", aluno);
        document.getElementById("nomeAluno").value = aluno;

    })

</script>

<script type="text/javascript">
function alternarCamposHorario() {

    const tipoAtraso = document.getElementById('tipoAtraso').checked;
    const tipoSaida = document.getElementById('tipoSaida').checked;
    const tipoRetorno = document.getElementById('tipoRetorno').checked;
    const tipoFardamento = document.getElementById('tipoFardamento').checked;
    const tipoAlmoco = document.getElementById('tipoAlmoco').checked;

    const containerEntrada = document.getElementById('containerEntrada');
    const containerSaida = document.getElementById('containerSaida');
    const containerRetorno = document.getElementById('containerRetorno');
    const containerAlmoco = document.getElementById('containerAlmoco');

    // Esconde tudo primeiro
    containerEntrada.style.display = 'none';
    containerSaida.style.display = 'none';
    containerRetorno.style.display = 'none';
    containerAlmoco.style.display = 'none';

    if (tipoAtraso) {

        containerEntrada.style.display = 'block';

    } else if (tipoSaida) {

        containerSaida.style.display = 'block';

    } else if (tipoRetorno) {

        containerSaida.style.display = 'block';
        containerRetorno.style.display = 'block';

    } else if (tipoAlmoco) {

        containerAlmoco.style.display = 'block';

    } else if (tipoFardamento) {

        // Nenhum horário é exibido

    }
}
</script>

</body>
</html>