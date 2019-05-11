<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

include('../conexao.php');

$nome = $_POST['nome_time'];
$cor = $_POST['cor'];
$data_criado = $_POST['data_fundacao'];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");

$cSQL = "INSERT INTO time (nome_time, cor_escudo, data_fundacao, created_at, updated_at)
			VALUES ('$nome', '$cor', '$data_criado', '$created_at', '$updated_at')";

if($oCon->query($cSQL)){
    $_SESSION['msg'] = "Time adicionado com sucesso!";
	header("Location: ../../listar.php?msg=sucesso");
	// echo "deu bom";
}else{
    $_SESSION['msg'] = "Ocorreu um erro ao tentar adicionar o time!";
	header("Location: ../../listar.php?msg=erro");
}
?>