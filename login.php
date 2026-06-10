<?php
session_start();

if(isset($_SESSION['acesso']) || isset($_SESSION['mensagem'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/login.css">
    <title> login </title>

</head>
<body>
    <div class="container" style="background-color:rgb(255, 255, 255);box-shadow: 0 4px 100px 0 rgba(0, 0, 0, 0.2), 0 6px 100px 0 rgba(0, 0, 0, 0.19)">
        <div class="row gx-0">
            <div class="col-6">
                <img class="mb-4" src="imagens/jaime_logo.png" alt="" width="100%" height="100%">
            </div>
            <div class="col-6 p-xl-5">
                <form class="text-center" style="margin-top: 155px" action="valida_login.php" method="POST">

                    <h1 class="h3 mb-3 fw-normal h1">Bem vindo ao Sistema</h1>
                        <div class="form-floating">
                            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="=" required>
                                <label for="floatingInput">Usuário</label>
                        </div>
                        
                        <div class="form-floating mt-2">
                            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="=" required>
                            <label for="floatingPassword">Senha</label>
                        </div>
                        <div class="checkbox mb-3">

                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Entrar</button>                           
                        </div>
                        <?php   
                        $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : null;

                        if (isset($mensagem)) { ?>
                            <div id="mensagem" class="alert alert-danger mt-3" role="alert">
                                <?php echo $mensagem; ?>
                            </div>
                        <?php } ?>
    
                 </form>

        </div>
    </div>





    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

    <script>
        setTimeout(function() {
            var mensagem = document.getElementById('mensagem');
            if (mensagem) {
                mensagem.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>