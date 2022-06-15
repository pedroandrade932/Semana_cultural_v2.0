<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	    span {
	        color: red;
	    }
	</style>
</head>
<body>
    <h1>Parte dos técnicos de T.I.</h1>
    <hr>
    <form action="deleteall.php" method="POST">
        <p>insira o id do cara a ser deletado.<span>*</span> (Não há volta se os dados forem apagados)</p>
        <input type="text" name="id" class="campo" maxlength="40" required autofocus>
        <br>
        <p>Digite a sua senha de T.I.<span>*</span></p>
        <input type="password" name="senha" class="campo" maxlength="15" required>
        <input type="submit" value="Enviar" id="btn">
    </form>
<?php
    $id = $_POST['id'];
    $pass = $_POST['senha'];
    $nomecad = '';
    
	$host = "localhost";
	$username = "spread_senhas";

	if ($pass == "<d4t4b4s3T1>"){
	    $password = "Alg0r1tm0s!";
	}else{
	    $password = "";
	}

	$dbase = "spread_senhas";
	if ($id != ''){
	    if ($password == ""){
	        echo '<script charset="utf-8">alert("Acesso negado.")</script>';
	    }else{
        	$conn = new PDO("mysql:host=$host;dbname=$dbase", $username, $password);
        	
        	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        	$data = $conn->prepare('SELECT * FROM cadastro WHERE id = :id');
        	$data->execute(array('id' => $id));
        	$result = $data->fetchAll();
        	if ( count($result) ) {
        		foreach($result as $row) {
        			$nomecad = $row[1];
        			}
        		}
        	}
    		$data = $conn->query("DELETE FROM cadastro WHERE id = $id");
    		echo '<script charset="utf-8">alert("Os dados foram deletados com sucesso!!!")</script>';
        
        	unset($data);
	    }
?>	
</body>
</html>
