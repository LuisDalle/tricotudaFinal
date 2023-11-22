<?php

    include 'conexao.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $sql= "select * from tb4_clientes
            where TX_Email = :email and
                    TX_Senha = :senha";


    $email = $_REQUEST['email'];
    $senha = md5($_REQUEST['senha']);

    $statementEdit = $pdo->prepare($sql);
    $statementEdit->bindParam(":email", $email);
    $statementEdit->bindParam(":senha", $senha);
    $statementEdit->execute();
    $usuario = $statementEdit->fetch(PDO::FETCH_OBJ);

    if($usuario){
        
        $_SESSION['usuario'] = $usuario; #informação que fica salva para usar em todas as paginas
        header("Location: index.php");#redireciona para index se as senhas forem iguais
    }else{
        header("Location: telaLoginTeste.php?mensagem= Usuário ou Senha inválidos!");#redireciona para telaLogin se a senha não bater
    }

?>