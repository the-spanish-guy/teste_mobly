<?php 
date_default_timezone_set('America/Sao_Paulo');
session_start();
include('../conexao.php');
// $nome = '';
if(isset($_GET['id'])){
	$id = $_GET['id'];
    $cSQL = "SELECT * FROM time WHERE id_time = $id";
    $oDados = mysqli_query($oCon, $cSQL);
    if(mysqli_num_rows($oDados)){
    	$oReg = mysqli_fetch_array($oDados);
    	$nome = $oReg['nome_time'];
    	$cor = $oReg['cor_escudo'];
    	$fundado = $oReg['data_fundacao'];
    	$criado = $oReg['created_at'];
    	$alterado = $oReg['updated_at'];
    }

    if(isset($_POST['update'])){
    	$id = $_GET['id'];
    	$nome = $_POST['nome_time'];
    	$cor = $_POST['cor'];
    	$updated_at = date('Y-m-d H:i:s');

    	$cSQL = "UPDATE time SET nome_time = '$nome', cor_escudo = '$cor', updated_at = '$updated_at' WHERE (id_time = $id)";
    	    	
    	if($oCon->query($cSQL)){
            $_SESSION['msg'] = "Time atualizado com sucesso";
			header("Location: ../../listar.php?msg=sucesso");
			// echo "deu bom";
		}else{
            $_SESSION['msg'] = "Houve um erro ao tentar atualizar o time";
			header("Location: ../../listar.php?msg=erro");
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
				<label for="nome_time">Nome do Time</label>
				<input type="text" value="<?php echo $nome ?>" name="nome_time" id="nome_time">
			</div>
				<div class="col s12 m6 input-field">
				 	<label for="cor">Cor do escudo</label>
					<input type="color" name="cor" id="cor" value="<?php echo $cor ?>">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m3 input-field">
					<label for="">Data de fundação</label>
					<input disabled type="text" value="<?php echo $fundado ?>">
				</div>
				<div class="col s12 m3 input-field">
					<label>Registro criado</label>
					<input type="text" disabled="disabled" value="<?php echo date("Y-m-d",strtotime($criado)) ?>">
				</div>
				<div class="col s12 m3 input-field">
					<label>Registro atualizado em</label>
					<input type="text" disabled="" value=" <?php echo date("d/m/Y H:i",strtotime($alterado)); ?>">
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
</body>
</html>