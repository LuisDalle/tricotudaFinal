<?php

    include 'conexao.php';
    session_start();

    $sqlInsert = "INSERT INTO `tb4_clientes` (`PK_ClienteID`, `TX_Nome`, `TX_Email`, `TX_Senha`, `TX_Endereco`, `DT_CriadoEm`, `DT_AtualizadoEm`, `NM_CEP`) 
    VALUES (NULL, :nome, :email, :senha, NULL, current_timestamp(), current_timestamp(), :cep);";

    $sqlVerifica = "SELECT * FROM tb4_clientes WHERE TX_Email = :email";

    $sqlUpdate = "UPDATE `tb4_clientes` SET `TX_Nome` = :nome, `TX_Email` = :email, `TX_Endereco` = :endereco, `NM_CEP` = :cep, `NM_Numero` = :numero
    WHERE PK_ClienteID = :id" ;


    if ($_REQUEST['update'] == 1) {

        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $endereco = $_REQUEST['endereco'];
        $cep = $_REQUEST['cep'];
        $numero = $_REQUEST['numero'];
        $id = $_REQUEST['id'];

        $statement2 = $pdo->prepare($sqlUpdate);
        $statement2->bindParam(":nome", $nome);
        $statement2->bindParam(":email", $email);
        $statement2->bindParam(":endereco", $endereco);
        $statement2->bindParam(":cep", $cep);
        $statement2->bindParam(":numero", $numero);
        $statement2->bindParam(":id", $id);
        $statement2->execute();
        $statusUpdate = $statement2->fetchAll(PDO::FETCH_OBJ);
        header("Location: telaUsuario.php");
    }


    if($_REQUEST['criar'] == 1) {
        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $senha = md5($_REQUEST['senha']);
        $cep = $_REQUEST['cep'];


        $statement1 = $pdo->prepare($sqlVerifica);
        $statement1->bindParam(":email", $email);
        $statement1->execute();
        $statusVerifica = $statement1->fetchAll(PDO::FETCH_OBJ); //se for nulo significa que o email é valido

        if ($statusVerifica == NULL) {
            $statement = $pdo->prepare($sqlInsert);
            $statement->bindParam(":nome", $nome);
            $statement->bindParam(":email", $email); 
            $statement->bindParam(":senha", $senha);
            $statement->bindParam(":cep", $cep); // ADICIONAR API QUE PEGA O ENDEREÇO BASEADO NO CEP
            $statement->execute();
            $statusInsert = $statement->fetch(PDO::FETCH_OBJ);
            if ($statusInsert != false) {
                header("Location: telaLoginTeste.php?mensagem= Não foi possível criar seu usuário :( ");
            } else {
                header("Location: telaLoginTeste.php?mensagem= Usuário criado com sucesso!");
            }
        } else {
            header("Location: telaLoginTeste.php?mensagem= Não foi possível criar seu usuário, email já cadastrado! ");
        }
}



   

?>