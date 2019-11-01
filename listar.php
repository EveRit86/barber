<?php

include("conexao.php");

$consulta = "SELECT * FROM usuarios";

$con = $mysqli->query($consulta) or die ($mysqli->error);

?>

<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" href="CSS/estilo.css">
    </head>
    <body>
    <div id="corpo-form-cad">    
        <table>
            <tr>
                <td>Nome</td>
                <td>Telefone</td>
                <td>E-mail</td>
            </tr> 
            <?php while($dado = $con->fetch_array()){?>
            <tr>
                <td><?php echo $dado["nome"]; ?></td>
                <td><?php echo $dado["telefone"]; ?></td>
                <td><?php echo $dado["email"]; ?></td>
                <td><a href="editar.php?codigo=<?php echo $dado["id_usuario"]; ?>">Editar</a> | 
                    <a href="excluir.php?codigo=<?php echo $dado["id_usuario"]; ?>">Excluir</a></td>
            </tr> 
            <?php } ?>
        </table>    
    </div>            
    </body>        
</html>    