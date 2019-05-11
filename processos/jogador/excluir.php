<?php
session_start(); 
include('../conexao.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$cSQL = "DELETE FROM jogador WHERE (id_jogador = $id)";
	if($oCon->query($cSQL)){
		$_SESSION['msg'] = "Jogador excluido com sucesso!";
		header("Location: ../../listar.php?msg=sucesso");
		// echo "deu bom";
	}else{
		$_SESSION['msg'] = "Ocorreu um erro ao tentar excluir o jogador!";
		header("Location: ../../listar.php?msg=erro");	
	}
}
 ?>