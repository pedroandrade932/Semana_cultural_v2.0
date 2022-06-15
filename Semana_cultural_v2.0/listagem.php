<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_styles/styles.css">
    <link rel="shortcut icon" href="_imagens/favicon.ico" type="image/x-icon">
    <title>Semana Cultural</title>
    <style>
        p.sen {
            padding: 3px;
            border: 1px solid black;
            font-weight: bold;
            width: 90%;
        }
        span {
            color: red;
        }
    </style>
</head>
<body>
    <footer>
        <p>
            ATENÇÃO: Esse site está disponível temporariamente.
        </p>
    </footer>
    <header>
        <a href="index.php">
        <img src="_imagens/Logo_nova.png" alt="Logo" width="275px">
        </a>
        <h1>Semana cultural</h1>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="listagem.php">Participantes</a>
        <a href="exps.html">Exposições</a>
        <a href="creditos.html">Créditos</a>
    </nav>
    <main>
        <h2>Lista de participantes.</h2>
        <?php
            $id = 0;
            try {
                $conn = new PDO('mysql:host=localhost;dbname=spread_senhas', 'spread_senhas', 'Alg0r1tm0s!');
                $stmt = $conn->prepare('SELECT * FROM cadastro ORDER BY nome');
                $stmt->execute(array('id' => $id));
            
                $result = $stmt->fetchAll();
            
                if ( count($result) ) {
                foreach($result as $row) {
                    print_r("<p class='sen'>Id: <span>$row[0]</span> | Nome: $row[1]</p>");
                }
                } else {
                    echo "<p>Nenhum participante na lista por enquanto.</p>";
                }
            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }
        ?>
    </main>
</body>
</html>
