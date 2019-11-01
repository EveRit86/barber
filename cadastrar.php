<?php
    require_once 'Classes/usuarios.php';
    $u = new Usuario;
?>    

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Cadastro</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form-cad">
    <h1>Cadastrar cliente</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome completo" maxlenght="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlenght="30">
        <input type="email" name="email" placeholder="E-mail" maxlenght="40">
        <input type="password" name="senha" placeholder="Senha" maxlenght="15">
        <input type="password" name="confirmarSenha" placeholder="Confirmar Senha" maxlenght="15">
        <input type="submit" value="Cadastrar">
    </form>
    <a href="sair.php">SAIR</a>
    <a href="agenda/month.php">calendario</a>
</div>  
<?php

if(isset($_POST['nome'])){

    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confirmarSenha']);

    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

        $u->conectar("barber","localhost","root","");
        if($u->msgErro == ""){
            if($senha == $confirmarSenha){
               if($u->cadastrar($nome,$telefone,$email,$senha)){
                   ?>
                        <div id="msg-sucesso">
                        Cadastrado com sucesso!
                        </div>
                    <?php
               }else{
                    ?>
                        <div class="msg-erro"> 
                            E-mail já cadastrado!
                        </div>   
                    <?php 
            }
        }else{
            ?>
                <div class="msg-erro"> 
                    Senhas não são iguais!
                </div>   
            <?php
       
        }
    }else{
            ?>
            <div> 
                <?php "Erro: ".$u->msgErro;?>
              
            </div>   
            <?php
            
        }
    }else{
        ?>
            <div class="msg-erro"> 
                Preencha todos os campos!
            </div>   
        <?php
       
    }
}

?>  
</body>
</html>    