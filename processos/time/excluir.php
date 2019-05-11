<?php 
session_start();
include('../conexao.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$cSQL = "DELETE FROM time WHERE (id_time = '$id')";
	if($oCon->query($cSQL)){
    	$_SESSION['msg'] = "Time excluido com sucesso!";
		header("Location: ../../listar.php?msg=sucesso");
		// echo "deu bom";
	}else{
    	$_SESSION['msg'] = "Ocorreu um erro ao tentar excluir o time!";
		header("Location: ../../listar.php?msg=erro");	
	}
}
 ?>