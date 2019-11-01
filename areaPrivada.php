<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){

        header("location: index.php");
        exit;
    }

?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Tela de menu</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

<a href="cadastrar.php">CADASTRAR</a>

<a href="sair.php">SAIR</a>
</body>
</html>