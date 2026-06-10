<?php
sleep(1);

if(!isset($_SESSION['acesso'])) {
    $_SESSION['mensagem'] = "Acesso negado! Faça login para acessar o sistema.";
    header("Location: login.php");
    exit();
}

require __DIR__ . '/ticket/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_impresora = "POS-58";




$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try {
	$logo = EscposImage::load("imagens/logo.png", false);
	$printer->bitImage($logo);
} catch (Exception $e) {
	/*No hacemos nada si hay error*/
}

/*
	Ahora vamos a imprimir un encabezado
*/
session_start();
include "../conexao.php";
$id_curso = $_SESSION['curso'];
$select_curso = mysqli_query($conn, "SELECT nome_curso FROM cursos WHERE nome_curso = $id_curso");

$id_serie = $_SESSION['serie'];
$select_serie = mysqli_query($conn, "SELECT nome_serie FROM serie WHERE nome_serie = $id_serie");

$printer->selectPrintMode(Printer::FONT_B);

$printer->text("\n" . "AUTORIZAÇÃO:" . "\n");
$printer->text("\n" ."-----------------------------". "\n");

$printer->text("\n" . "ALUNO:" . "\n");
$printer->text("\n" . $_SESSION['nome'] . "\n");

$printer->text("\n" ."-----------------------------". "\n");




$printer->text(" CURSO". $id_curso."\n");
$printer->text("\n" ."-----------------------------". "\n");

$printer->text(" SERIE". $id_serie."\n");
$printer->text("\n" ."-----------------------------". "\n");


$tipo_autorizacao = $_SESSION['tipo'];

if ($tipo_autorizacao == 'fardamento_completo') {

	$printer->text(" OBSERVAÇÃO:");
	$printer->text("". $_SESSION['obs']."\n");
	$printer->text("\n" ."-----------------------------". "\n");

	$printer->text("".date("d/m/Y - H:i:s") ."\n");

	$printer->feed(3);
	$printer->cut();
	$printer->pulse();
	$printer->close();

} elseif ($tipo_autorizacao == 'entrada') {
	$printer->text(" ENTRADA:". $_SESSION['entrada']."\n");

	$printer->text("\n" ."-----------------------------". "\n");
	$printer->text(" OBSERVAÇÃO:");
	$printer->text("". $_SESSION['obs']."\n");
	$printer->text("\n" ."-----------------------------". "\n");


	$printer->text("".date("d/m/Y - H:i:s") ."\n");

} elseif ($tipo_autorizacao == 'saida') {
	$printer->text(" SAÍDA:". $_SESSION['saida']."\n");

	$printer->text("\n" ."-----------------------------". "\n");
	$printer->text(" OBSERVAÇÃO:");
	$printer->text("". $_SESSION['obs']."\n");
	$printer->text("\n" ."-----------------------------". "\n");

	$printer->text("".date("d/m/Y - H:i:s") ."\n");

}  elseif ($tipo_autorizacao == 'saida_com_retorno') {
	$printer->text(" SAÍDA:". $_SESSION['saida']."\n");
	$printer->text("\n" ."-----------------------------". "\n");

	$printer->text(" RETORNO:". $_SESSION['entrada']."\n");

	$printer->text("\n" ."-----------------------------". "\n");
	$printer->text(" OBSERVAÇÃO:");
	$printer->text("". $_SESSION['obs']."\n");
	$printer->text("\n" ."-----------------------------". "\n");;

	$printer->text("".date("d/m/Y - H:i:s") ."\n");
}


