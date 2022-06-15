<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="0; url=index.php">
	<title>Document</title>
</head>
<body>
<?php
	$host = "localhost";
	$username = "spread_senhas";
	$password = "Alg0r1tm0s!";
	// Diretorio: opt/lampp/var/mysql/
	$dbase = "spread_senhas";

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$nomecad = '';

	try {
	    if ($nome != ''){
    		$conn = new PDO("mysql:host=$host;dbname=$dbase", $username, $password);
    		
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    		$data = $conn->prepare('SELECT * FROM cadastro WHERE nome = :nome');
    		$data->execute(array('nome' => $nome));
    		$result = $data->fetchAll();
    		if ( count($result) ) {
    			foreach($result as $row) {
    				$nomecad = $row[1];
    			}
    
    		}
    		if ($nomecad == $nome) {
    			echo '<script charset="utf-8">alert("O nome já foi cadastrado por outra pessoa.")</script>';
    		}
    		else{
    			$data = $conn->query("INSERT INTO cadastro (nome, email) VALUES ('$nome', '$email')");
    			echo '<script charset="utf-8">alert("O nome foi cadastrado com sucesso!!!.")</script>';
    		}
    
    		unset($data);
    		
    		$mensagem = "Olá, $nome, seja bem vindo à semana cultural do 2º ano de Informática! Temos orgulho de tê-lo como nosso visitante! Durante sua visita, esperamos que desfrute das releituras de obras feitas por nossa equipe de artistas, escutar as músicas preparadas pelos nossos músicos, além de participar do sorteio que haverá na sala. Desejamos uma boa visita e uma boa semana de cultura e arte!!!";
    		// Corpo E-mail
            $arquivo = "
            <style type='text/css'>
            body {
                margin:0px;
                font-family:Verdane;
                font-size:12px;
                color: #666666;
            }
            a{
                color: #666666;
                text-decoration: none;
            }
            a:hover {
                color: #FF0000;
                text-decoration: none;
            }
            table {
                background-color: #CCCCCC;
                width: 510px;
            }
            </style>
            <html>
                <table style='background-color: #9F814D;' border='1' cellpadding='1' cellspacing='1'>
                    <tr>
                        <td>
                            <tr>
                                <td width='500'>Nome: $nome</td>
                            </tr>
                            <tr>
                                <td width='320'>E-mail: <strong>$email</strong></td>
                            </tr>
                            <tr>
                                <td width='320'><strong>$mensagem</strong></td>
                            </tr>
                            <tr>
                                <td><img src='https://culturalweek4ifpb.spreadplus.com.br/_imagens/Logo_nova.png' width='275px'></td>
                            </tr>
                        </td>
                    </tr>
                </table>
            </html>
            ";
            //enviar
            
            // emails para quem será enviado o formulário
            $emailenviar = $email;
            $destino = $emailenviar;
            $assunto = "Contato pelo Site da Semana cultural.";
            
            // É necessário indicar que o formato do e-mail é html
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: $nome <$email>';
            //$headers .= "Bcc: $EmailPadrao\r\n";
            
            $enviaremail = mail($destino, $assunto, $arquivo, $headers);
            if($enviaremail){
            $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
            }else {
            $mgm = "ERRO AO ENVIAR E-MAIL!";
            }
            //echo $mgm;
	    }else{
	        echo "<script charset='utf-8'>alert('Nome inválido! Contate a assistência se acha que isso é um erro.')</script>";
	    }
	}catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
?>	
</body>
</html>
