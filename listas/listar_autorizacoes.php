
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    /* Força a tabela a respeitar as larguras e não esticar */
    .table-fixa {
        width: 100%;
    }

    /* Aplica a quebra de linha automática na coluna de observação */
    .col-observacao {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word; /* Garante a quebra em navegadores antigos */
    }
</style>
</head>

<body>
<!-- TABLE USUÁRIOS -->
<div class="container">

    <!-- h1>Listar alunos</h1>
		<a href="relatorio.php?param=alunos" target="_blank">
			<button type="button" class="btn btn-outline-dark">
				<i class="bi bi-file-earmark-pdf"></i> Relatório
			</button>
          </a>
		<hr -->

    <table class="table table-striped table-fixa">
        <thead>
            <tr>
                <th scope="col">Aluno</th>
                <th scope="col">Tipo</th>
                <th scope="col" class="col-observacao" style="width: 30%;">Observação</th>
                <th scope="col">Entrada</th>
                <th scope="col">Saída</th>
                <th scope="col">Emissão</th>
                



                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php

            $select_autorizacoes = mysqli_query($conn, "SELECT * FROM autorizacoes ORDER BY data_emissao DESC");

            $num_rows = mysqli_num_rows($select_autorizacoes);
            $contador_lista = 0;

            if ($num_rows == 0) {

                echo "<tr><td colspan='5'>Nenhuma autorização encontrada.</td></tr>";

            } else {
    
                while ($contador_lista < $num_rows) {

                    $autorizacoes = mysqli_fetch_assoc($select_autorizacoes);
                    $id_aluno = $autorizacoes['id_aluno'];

                    $nome_aluno = mysqli_query($conn, "SELECT nome FROM alunos WHERE id_aluno = $id_aluno");
                    $result_nome = mysqli_fetch_assoc($nome_aluno);

                    $contador_lista++;

                ?>

                    <tr>
                        <td><?php echo $result_nome['nome']; ?></td>

                        <?php
                        
                        $tipo = $autorizacoes['tipo'];

                            switch ($tipo) {

                            case "saida_almoco":

                                ?>
                                <td> Saída para o almoço </td>
                                <?php
                                break;

                            case "fardamento_incompleto":
                                ?>
                                <td>Fardamento incompleto</td>
                                <?php
                                break;
                                
                            case "saida":
                                ?>
                                <td>Saída</td>
                                <?php
                                break;

                            case "atraso_entrada":
                                ?>
                                <td>Entrada/Atraso</td>
                                <?php
                                break;


                            case "retorno":
                                ?>
                                <td>Saída com retorno</td>
                                <?php
                                break;

                        }
                        ?>

                        <td class="col-observacao"><?php echo $autorizacoes['observacao']; ?></td>
                        <?php
                        $tipo = $autorizacoes['tipo'];

                            switch ($tipo) {

                            case "saida_almoco":

                                ?>
                                <td>Sem horário</td>
                                <td><?php echo $autorizacoes['saida']; ?></td>
                                <?php
                                break;

                            case "fardamento_incompleto":
                                ?>
                                <td colspan="2">Dia inteiro</td>
                                <?php
                                break;
                                
                            case "saida":
                                ?>
                                <td>Sem horário</td>
                                <td><?php echo $autorizacoes['saida']; ?></td>
                                <?php
                                break;

                            case "atraso_entrada":
                                ?>
                                <td><?php echo $autorizacoes['entrada']; ?></td>
                                <td>Sem horário</td>
                                <?php
                                break;


                            case "retorno":
                                ?>
                                <td><?php echo $autorizacoes['entrada']; ?></td>
                                <td><?php echo $autorizacoes['saida']; ?></td>
                                <?php
                                break;


                            default:
                                
                                


                            }

                        ?>
                        <td><?php echo $autorizacoes['data_emissao']; ?></td>
                        
                        <td>

                            <!-- editarAlunoModal -->
                            <button type="button" class="btn btn-outline-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#editarAutorizacao"
                                data-bs-curso="<?php echo $curso_aluno; ?>"
                                data-bs-serie="<?php echo $serie_aluno; ?>"
                                data-bs-id="<?php echo $alunos['id_aluno'] ?>"
                                data-bs-aluno="<?php echo $alunos['nome'] ?>">
                                <i class="bi bi-pencil-square"></i>
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






<!-- Modal AUTORIZAÇÕES -->
<div class="modal fade" id="editarAutorizacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="alunoTurma" name="turma" required>

                    <!-- Campo Nome do Aluno -->
                    <div class="mb-3">
                        <label class="col-form-label">Nome do Aluno:</label>
                        <input type="text" class="form-control" id="nomeAluno" name="aluno" required>
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
                        
                        <!-- Horário de Saída -->
                        <div class="col-md-6" id="containerSaida" style="display: none;">
                            <div class="mb-3">
                                <label for="horarioSaida" class="form-label">Horário de Saída:</label>
                                <input type="time" class="form-control" id="horarioSaida" name="horario_saida">
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
                <h5 class="modal-title">Esadkfhkdfjditar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="editar.php?edit=usuario">
                <div class="modal-body">

                    <!-- ID Usuário -->
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

<!-- MODAIS SUCESSO/ERRO -->

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

            var curso = button.getAttribute('data-bs-curso');
            document.getElementById('editarAluno').value = curso;

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
        document.getElementById("alunoTurma").value = serie;

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

    const containerEntrada = document.getElementById('containerEntrada');
    const containerSaida = document.getElementById('containerSaida');

    if (tipoAtraso) {
        containerEntrada.style.display = 'block';
        containerSaida.style.display = 'none';
        containerEntrada.style.order = '0';
        containerSaida.style.order = '1';
    } else if (tipoSaida) {
        containerEntrada.style.display = 'none';
        containerSaida.style.display = 'block';
        containerEntrada.style.order = '0';
        containerSaida.style.order = '1';
    } else if (tipoRetorno) {
        containerSaida.style.display = 'block';
        containerEntrada.style.display = 'block';
        containerSaida.style.order = '0';
        containerEntrada.style.order = '1';
    } else if (tipoFardamento) {
        containerEntrada.style.display = 'none';
        containerSaida.style.display = 'none';
        containerEntrada.style.order = '0';
        containerSaida.style.order = '1';
    }
}
</script>

</body>
</html>