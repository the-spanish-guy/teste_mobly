<?php

$servidor = "localhost";
$usuario = "root";
$senha = "password";
$banco = "teste_mobly";

$oCon = mysqli_connect($servidor, $usuario, $senha, $banco) or die('Não foi possível conectar '. mysqli_connect_error());

?>