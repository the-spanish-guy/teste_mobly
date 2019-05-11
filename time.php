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
		<form action="processos/time/inserir.php" class=" center-align" method="POST">
			<div class="row">
				<div class="col s12 m6 input-field">
					<label for="nome_time">Nome do time</label>
					<input type="text" name="nome_time">
				</div>
				<div class="col s12 m6 input-field">
					<label for="cor">cor do escudo</label>
					<input type="color" name="cor">
				</div>
			</div>

			<div class="col s12">
				<div class="col s12 m12 input-field">
					<label for="data_fundacao">Data de Fundação</label>
					<input type="text" class="datepicker" name="data_fundacao">
				</div>
			</div>
		
			<div class="row">
				<div class="col s12 m4">
					<button class="btn waves-effect waves-light" type="submit" name="action">Inserir Time
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
		    $('.datepicker').datepicker({
				i18n: {
					months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
					monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
					weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
					weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
					weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
					today: 'Hoje',
					clear: 'Limpar',
					cancel: 'Sair',
					done: 'Confirmar',
					labelMonthNext: 'Próximo mês',
					labelMonthPrev: 'Mês anterior',
					labelMonthSelect: 'Selecione um mês',
					labelYearSelect: 'Selecione um ano',
					selectMonths: true,
					selectYears: 15,
				},
				format: 'yyyy-mm-dd',
				container: 'body',
				// minDate: new Date(),
		    });
		});
	</script>
</body>
</html>