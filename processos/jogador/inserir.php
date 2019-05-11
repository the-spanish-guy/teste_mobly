<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

include('../conexao.php');

$nome = $_POST['nome_jogador'];
$sobrenome = $_POST['sobrenome_jogador'];
$time = $_POST['select_time'];
$numero_camisa = $_POST['numero_camisa'];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");

$cSQL = "INSERT INTO jogador (nome_jogador, sobrenome_jogador, time, numero_camisa, created_at, updated_at) VALUES ('$nome', '$sobrenome', '$time', '$numero_camisa', '$created_at', '$updated_at')";

if($oCon->query($cSQL)){
    $_SESSION['msg'] = "Jogador adicionado com sucesso!";
	header("Location: ../../listar.php?msg=sucesso");
}else{
    $_SESSION['msg'] = "Ocorreu um erro ao tentar adicionar o jogador!";
	header("Location: ../../listar.php?msg=erro");
}
?>