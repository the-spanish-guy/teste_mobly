<?php include('processos/conexao.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/inserir.css">
</head>
<body>
	<div class="row">
		<div class="col s12"><a href="index.php" class="valign-wrapper"><i class="material-icons">reply</i>Voltar</a></div>
	</div>
	<div class="container">
		<form action="processos/jogador/inserir.php" class="center-align" method="POST">
			<div class="row">
				<div class="col s12 m6 input-field">
					<label for="nome_jogador">nome</label>
					<input type="text" id="nome_jogador" name="nome_jogador">
				</div>
				<div class="col s12 m6 input-field">
					<label for="sobrenome_jogador">Sobrenome</label>
					<input type="text" id="sobrenome_jogador" name="sobrenome_jogador">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6 input-field">
					<select name="select_time" id="select_time" class="icon">
						<?php 
							
							$cSQL = "SELECT * FROM time";
						    $oDados = mysqli_query($oCon, $cSQL);
						    while($oReg = mysqli_fetch_array($oDados)){
						 ?>
						 <option value="<?php echo $oReg['id_time'] ?>"><?php echo $oReg['nome_time'] ?></option>
						<?php } ?>
					</select>
					<label>Selecione o Time</label>
				</div>
				<div class="col s12 m6 input-field">
					<label for="numero_camisa">Numero da camisa</label>
					<input type="text" name="numero_camisa" id="numero_camisa">
				</div>
			</div>
		
			<div class="row">
				<div class="col s12 m4">
					<button class="btn waves-effect waves-light" type="submit" name="action">Inserir Jogador
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