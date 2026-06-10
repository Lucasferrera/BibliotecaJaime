<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
     header("Location: login.php");
     $_SESSION['mensagem'] = "Usuário ou senha inválidos.";
     exit();
}

     include "conexao.php";

     $usuario = $_POST["usuario"];
     $senha = $_POST["senha"];

     $select_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE login = '$usuario'");

     if (mysqli_num_rows($select_usuario) > 0) {

          $result_usuarios = mysqli_fetch_assoc($select_usuario);

          if (password_verify($senha, $result_usuarios['senha'])) {

               $_SESSION['usuario'] = $result_usuarios['login'];
               $_SESSION['id_usuario'] = $result_usuarios['id_usuario'];
               $_SESSION['acesso'] = true;
               $_SESSION['reg_acesso'] = true;

               header("Location: dashboard.php");

               exit();

          } else {

               $_SESSION['mensagem'] = "Usuário ou senha inválidos.";
               header("Location: login.php");
               exit();

          }
          

     } else {

          $_SESSION['mensagem'] = "Usuário ou senha inválidos.";
          header("Location: login.php");
          exit();

     }

