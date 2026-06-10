    <?php
    session_start();

    include "conexao.php";

    if(!isset($_SESSION['acesso'])) {
        $_SESSION['mensagem'] = "Acesso negado! Faça login para acessar o sistema.";
        header("Location: login.php");
        exit();
    }
    if(isset($_SESSION['reg_acesso']) && $_SESSION['reg_acesso'] === true) {
        $id_usuario = $_SESSION['id_usuario'];

        $insert_acesso = mysqli_query($conn, "INSERT INTO acessos (id_usuario, data_acesso) VALUES ('$id_usuario', NOW())");
        $_SESSION['reg_acesso'] = false;
    }
    function verificarInternet() {

        $conectado = @fsockopen("8.8.8.8", 53, $errno, $errstr, 2);

        if ($conectado) {
             fclose($conectado);
            return true;
        }
        return false;
    }

    $useLocalBootstrap = !verificarInternet();
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <?php if ($useLocalBootstrap) { ?>

            <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

        <?php } else { ?>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <?php } ?>
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <title>Dashboard</title>

    </head>

    <body class="bg-light">

        <!-- BARRA DE MENUS -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light position-relative">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">
                    <i class="bi bi-house-door"></i>
                    Sistema da Coordenação
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">

                            <button class="nav-link dropdown-toggle border-0 bg-transparent"
                                id="navbarDropdownAlunos"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                type="button">
                                <i class="bi bi-people"></i> Alunos
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAlunos">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#importarCsvModal">Importar arquivo CSV
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#cadastroalunoModal">Cadastrar</a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#" onclick="listarAlunos()">Listar</a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAutorizacoes" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-hand-thumbs-up"></i> Autorizações
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAutorizacoes">



                                <li>
                                    <a class="dropdown-item" href="#" onclick="listarAutorizacoes()">Listar</a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAcessos" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-clock"></i> Acessos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAcessos">

                                <li><a class="dropdown-item" href="#" onclick="listarAcessos()">Listar</a></li>
                            </ul>
                        </li>

                    </ul>

                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#confirmesairModal">Sair</button>

                </div>
            </div>
        </nav>
        <!-- BARRA DE MENUS -->

        <p>

        <div class="container-fluid">

            <div id="mainContent">
                <?php

                if (isset($_GET['lista'])){ $lista = $_GET['lista']; } else {
                    include "listas/listar_alunos.php";
                }

                if (isset($lista) && $lista == 'alunos') {
                    include "listas/listar_alunos.php";
                          
                } elseif (isset($_GET['lista']) && $lista == 'autorizacoes') {
                    include "listas/listar_autorizacoes.php";
                    
                } elseif (isset($_GET['lista']) && $lista == 'acessos') {
                    include "listas/listar_acessos.php";
                }
                    
                ?>
                
            </div>

            <script type="text/javascript">
                function listarAlunos() {
                    window.location.href = 'dashboard.php?lista=alunos';
                }

                function listarAutorizacoes() {
                    window.location.href = 'dashboard.php?lista=autorizacoes';
                }

                function listarAcessos() {
                    window.location.href = 'dashboard.php?lista=acessos';
                }
            </script>


            <!-- Modal EXCLUIR -->
            <?php
            if (isset($_GET['process'])) {

                if ($_GET['process'] === 'true') { ?>
                    <script>
                        var sucessoModal = new bootstrap.Modal(document.getElementById('sucessoModal'));
                        sucessoModal.show();
                    </script>
                <?php
                } elseif ($_GET['process'] === 'false') { ?>
                     <script>
                        var erroModal = new bootstrap.Modal(document.getElementById('erroModal'));
                        erroModal.show();
                    </script>
                <?php
                    }
                } else {
                }       
                ?>


            <!-- RODAPÉ -->
            <footer class="py-2 my-0 border-top">
                <p class="text-center text-muted">&copy; EEEP Jaime Alencar de Oliveira <?= date("Y") ?></p>
            </footer>
            <!-- RODAPÉ -->

            <?php
            if (isset($_GET['insert'])) {

                if ($_GET['insert'] === 'true') { ?>
                    <script>
                        var sucessoModal = new bootstrap.Modal(document.getElementById('sucessoModal'));
                        sucessoModal.show();
                    </script>
                <?php } else { ?>
                    <script>
                        var erroModal = new bootstrap.Modal(document.getElementById('erroModal'));
                        erroModal.show();
                    </script>
                <?php
                }
            }

            if (isset($_GET['value'])) {
                if ($_GET['value'] === 'false') { ?>

                    <script>
                        var invalidoModal = new bootstrap.Modal(document.getElementById('invalidoModal'));
                        invalidoModal.show();
                    </script>

                <?php } else { ?>

                    <script>
                        var invalidoModal = new bootstrap.Modal(document.getElementById('invalidoModal'));
                        invalidoModal.show();
                    </script>
            <?php
                }
            }
            ?>


            <div class="modal fade" id="confirmesairModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deseja sair do sistema?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                            <a href="login.php"><button type="button" class="btn btn-primary">Sim</button></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal CADASTRO ALUNO -->
            <div class="modal fade" id="cadastroalunoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastro de Aluno</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form method="POST" action="cadastro.php">
                            <div class="modal-body">

                                <div class="col-12">
                                    <label class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nomeAluno" name="nomeAluno"
                                        placeholder="nome do aluno" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Matrícula:</label>
                                    <input type="text" class="form-control" id="matriculaAluno"
                                        name="matriculaAluno" placeholder="digite sua matrícula" maxlength="8"
                                        minlength="8" required>
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">Curso</label>
                                    <select id="curso" name="id_curso" class="form-control">
                                        <option value="0" selected disabled>Selecione o curso</option>
                                        <option value="1">Desenvolvimento de Sistemas</option>
                                        <option value="2">Eletromecânica</option>
                                        <option value="3">Multimídia</option>
                                        <option value="4">Produção de áudio e vídeo</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">Série</label>
                                    <select id="serie" name="id_serie" class="form-control">
                                        <option value="0" selected disabled>Selecione a série</option>
                                        <option value="1">1º Ano</option>
                                        <option value="2">2º Ano</option>
                                        <option value="3">3º Ano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div>
                

            </div>

            <!-- Modal IMPORTAR CSV -->
            <div class="modal fade" id="importarCsvModal" tabindex="-1" aria-labelledby="importarCsvModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importarCsvModalLabel">
                                <i class="bi bi-file-earmark-arrow-up"></i> Importar Arquivo CSV
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <!-- Altere o action para o arquivo PHP que processará o CSV -->
                        <form method="POST" action="importacao.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="arquivoCsv" class="form-label">Selecione o arquivo (.csv)</label>
                                    <input class="form-control" type="file" id="arquivoCsv" name="arquivo_csv"
                                        accept=".csv" required>
                                    <div class="form-text">Certifique-se de que o arquivo está no formato UTF-8 para
                                        evitar erros de acentuação.</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload"></i> Enviar Arquivo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Sucesso Modal-->
            <div class="modal fade" id="sucessoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-success">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-check-lg"></i> Sucesso!
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Operação realizada com sucesso!
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sucesso Modal-->

            <!-- Erro Modal-->
            <div class="modal fade" id="erroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-lg mr-2"></i> Erro!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Erro na operação!
                        </div>
                    </div>
                </div>
            </div>
            <!-- Erro Modal-->

            <!-- Erro Modal-->
            <div class="modal fade" id="invalidoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-x-lg mr-2"></i> Erro!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Parámetro inválido!
                        </div>
                    </div>
                </div>
            </div>

    <?php
    if (isset($_GET['process'])) {
    if ($_GET['process'] === 'true') { ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modalEl = document.getElementById('sucessoModal');
                if (modalEl) new bootstrap.Modal(modalEl).show();
            });
        </script>
    <?php
    } else { ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modalEl = document.getElementById('erroModal');
                if (modalEl) new bootstrap.Modal(modalEl).show();
            });
        </script>
<?php
    }
}
?>

        <!-- Bootstrap JavaScript Bundle -->
        <?php if ($useLocalBootstrap) { ?>
            <script src="bootstrap/bootstrap.bundle.min.js"></script>
        <?php } else { ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <?php } ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log("Bootstrap:", typeof bootstrap);
        });
    </script>
</body>

    

</html>