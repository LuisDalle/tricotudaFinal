<?php
include 'conexao.php';

$id = $_REQUEST['id'];
$senhaBancoAntiga = $_REQUEST['senhaBancoAntiga'];
$senhaAntiga = $_REQUEST['senhaAntiga'];
$senha = $_REQUEST['senha'];
//$confirmarSenha = $_REQUEST['confirmarSenha'];

$senha = md5($senha);
$senhaAntiga = md5($senhaAntiga);

if($senhaBancoAntiga == $senhaAntiga) {
    $sql = "UPDATE `tb4_clientes` SET `TX_Senha` = :senha WHERE `PK_ClienteID` = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":senha", $senha);
    $statement->bindParam(":id", $id);
    $statement->execute();
    //$resultado = $statement->fetchAll(PDO::PARAM_STR);
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    header("Location: telaLoginTeste.php?mensagem= Senha Alterada com Sucesso!");

} else {
    header("Location: telaUsuario.php?mensagem= Erro! Não foi possivel alterar sua senha!");
}






?>