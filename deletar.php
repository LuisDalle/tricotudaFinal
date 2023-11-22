<?php
include 'conexao.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM tb4_clientes WHERE PK_ClienteID= :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->execute();
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    header("Location: telaLoginTeste.php");


?>