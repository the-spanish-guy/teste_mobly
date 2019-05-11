<?php 
include('processos/conexao.php');
include('processos/mensagem.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="css/listar.css">
</head>
<body>
	<div class="row">
		<div class="col s12"><a href="index.php" class="valign-wrapper"><i class="material-icons">reply</i>Voltar</a></div>
	</div>
	<div class="row">
		<div class="col s12 m5 offset-m1">
			<table class="striped centered responsive-table">
				<thead>
					<tr>
						<th>Nome Jogador</th>
						<th>Sobrenome</th>
						<th>Nºcamisa</th>
						<th>Nome do Time</th>
						<th>Opções</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					    $cSQL = "SELECT jogador.id_jogador, jogador.nome_jogador, jogador.sobrenome_jogador, jogador.numero_camisa, time.nome_time 
									FROM jogador JOIN time
									ON time.id_time = jogador.time";
					    $oDados = mysqli_query($oCon, $cSQL);
					    while($oReg = mysqli_fetch_array($oDados)){
					?>
					<tr>
						<td><?php echo $oReg['nome_jogador'] ?></td>
						<td><?php echo $oReg['sobrenome_jogador'] ?></td>
						<td><?php echo $oReg['numero_camisa'] ?></td>
						<td><?php echo $oReg['nome_time'] ?></td>
						<td><a href="processos/jogador/editar.php?id=<?php echo $oReg['id_jogador'] ?>"><i class="material-icons">edit</i></a></td>
						<td><a href="processos/jogador/excluir.php?id=<?php echo $oReg['id_jogador'] ?>"><i class="material-icons">delete</i></a></td>
					</tr>
					<br>
					<?php } ?>
				</tbody>	
			</table>
		</div>
		
		<div class="col s12 m5">
			<table class="striped centered">
				<thead>
					<tr>
						<th>Nome do Time</th>
						<th>Cor do Escudo</th>
						<th>Data de fundação</th>
						<th>Opções</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					    $cSQL = "SELECT * FROM time";
					    $oDados = mysqli_query($oCon, $cSQL);
					    while($oReg = mysqli_fetch_array($oDados)){
					?>
					<tr>
						<td><?php echo $oReg['nome_time'] ?></td>
						<td><div style='background-color:<?php echo $oReg['cor_escudo'] ?>; width:100px; height:20px'></div></td>
						<td><?php echo $oReg['data_fundacao'] ?></td>
						<td><a href="processos/time/editar.php?id=<?php echo $oReg['id_time'] ?>"><i class="material-icons">edit</i></a></td>
						<td><a href="processos/time/excluir.php?id=<?php echo $oReg['id_time'] ?>"><i class="material-icons">delete</i></a></td>
					</tr>
					<br>
					<?php } ?>
				</tbody>	
			</table>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>