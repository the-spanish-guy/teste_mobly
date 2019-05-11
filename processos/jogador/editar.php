<?php
date_default_timezone_set('America/Sao_Paulo');
	session_start();
	include('../conexao.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	    $cSQL = "SELECT * FROM jogador where id_jogador = $id";
	    $oDados = mysqli_query($oCon, $cSQL);
	    if(mysqli_num_rows($oDados)==1){
	    	$oReg = mysqli_fetch_array($oDados);
	    	$nome = $oReg['nome_jogador'];
	    	$sobrenome = $oReg['sobrenome_jogador'];
	    	$time = $oReg['time'];
	    	$ncamisa = $oReg['numero_camisa'];
	    	$criado = $oReg['created_at'];
	    	$alterado = $oReg['updated_at'];
	    }


	    if(isset($_POST['update'])){
	    	$id = $_GET['id'];
	    	$nome = $_POST['nome_jogador'];
	    	$sobrenome = $_POST['sobrenome_jogador'];
	    	$time = $_POST['select_time'];
	    	$ncamisa = $_POST['numero_camisa'];
	    	$updated_at = date("Y-m-d H:i:s");

	    	$cSQL = "UPDATE jogador SET nome_jogador = '$nome', sobrenome_jogador = '$sobrenome', time = '$time', numero_camisa = '$ncamisa', updated_at = '$updated_at' WHERE (id_jogador = $id)";
	    	    	
	    	if($oCon->query($cSQL)){
	    		$_SESSION['msg'] = "Jogador atualizado com sucesso!";
				header("Location: ../../listar.php");
			}else{
	    		$_SESSION['msg'] = "Houve um erro ao tentar atualizar jogador!";
				header("Location: ../../listar.php");
			}
	    }
	}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="../../css/editar.css">
 </head>
 <body>
	<div class="row">
		<div class="col s12"><a href="../../listar.php" class="valign-wrapper"><i class="material-icons">reply</i>Voltar</a></div>
	</div>
 	<div class="container">
 		<form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST" class="center-align">
			<div class="row">
				<div class="col s12 m6 input-field">
					<label for="nome_jogador">Nome do Time:</label>
					<input type="text" value="<?php echo $nome ?>" id="nome_jogador" name="nome_jogador">
				</div>
				<div class="col s12 m6 input-field">
					<label for="sobrenome_jogador">Sobrenome Jogador</label>
					<input type="text" name="sobrenome_jogador" id="sobrenome_jogador" value="<?php echo $sobrenome ?>">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m4 input-field">
					<label for="">Time atual:</label>
					<?php 
						$cSQL = "SELECT ti.id_time, ti.nome_time
								FROM jogador AS jog JOIN time AS ti
								ON ti.id_time = jog.time WHERE jog.id_jogador = '$_GET[id]'";
					    $oDados = mysqli_query($oCon, $cSQL);
					    if($oReg = mysqli_fetch_array($oDados)){
					 ?>
					 <input type="text" disabled name="" value="<?php echo $oReg['nome_time'] ?>">
					<?php } ?>
				</div>
				<div class="col s12 m4 input-field">
					<select name="select_time" id="select_time">
						<?php 
					 						 		
							$cSQL = "SELECT * FROM time";
						    $oDados = mysqli_query($oCon, $cSQL);
						    while($oReg = mysqli_fetch_array($oDados)){
						 ?>
						 <option value="<?php echo $oReg['id_time'] ?>"><?php echo $oReg['nome_time'] ?></option>
						<?php } ?>
					</select>
					<label for="select_time">Mudar o time ?</label>
				</div>
				<div class="col s12 m4 input-field">
					<label for="numero_camisa">Numero da camisa</label>
					<input type="text" name="numero_camisa" id="numero_camisa" value="<?php echo $ncamisa ?>">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6 input-field">
					<label for="criado">Registro criado</label>
					<input type="text" disabled="disabled" value="<?php echo date("Y-m-d",strtotime($criado)) ?>">
				</div>
				<div class="col s12 m6 input-field">
					<label for="criado">Registro atualizado em</label>
					<input type="text" disabled="disabled" value="<?php echo date("Y-m-d H:s",strtotime($alterado)) ?>">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m3">
					<button class="btn waves-effect waves-light" type="submit" name="update">Atualizar
					    <i class="material-icons right">send</i>
					</button>
				</div>
			</div>
 		</form>
 	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('select').formSelect();
		 });
	</script>
 </body>
 </html>