<?php
    require_once 'Classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Tela principal</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form">
    <form method="POST">
        <input type="email" name="email" placeholder="Usuário" maxlenght="40">
        <input type="password" name="senha" placeholder="Senha" maxlenght="15">
        <input type="submit" value="ACESSAR">
        
    </form>
</div> 
<?php

if(isset($_POST['email'])){

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
   
    if(!empty($email) && !empty($senha)){

        $u->conectar("barber","localhost","root","");
        if($u->msgErro == ""){
            if($u->logar($email,$senha)){
                header("location: areaPrivada.php");
            }else{
            ?>
                <div id="msg-erro"> 
                    E-mail ou senha incorretos !
                </div>   
            <?php
           
            }
        }    
    }else{
        ?>
            <div id="msg-erro"> 
                Preencha todos os campos!
            </div>   
        <?php
       
    }
}    
?>          
</body>
</html>    