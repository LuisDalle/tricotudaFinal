<?php
include 'conexao.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sql = "select * from tb4_clientes
            where TX_Email = :email and
                    TX_Senha = :senha";

$email = $_SESSION['usuario']->TX_Email;
$senha = $_SESSION['usuario']->TX_Senha;

$statement = $pdo->prepare($sql);
$statement->bindParam(":email", $email);
$statement->bindParam(":senha", $senha);
$statement->execute();
$dadosPessoais = $statement->fetch(PDO::FETCH_OBJ);

$clienteId = $dadosPessoais->PK_ClienteID;
$produtoId = $_REQUEST['produtoId'];

if(!isset($_SESSION['usuario'])) {
    header("Location: telaLoginTeste.php");
}

$sql3 = "SELECT * from tb2_carrinhosalvo WHERE FK_ClienteID = :clienteId and NR_ProdutoID = :produtoId";
$statement3 = $pdo->prepare($sql3);
$statement3->bindParam(":clienteId", $clienteId);
$statement3->bindParam(":produtoId", $produtoId);
$statement3->execute();
$resultado = $statement3->fetch(PDO::FETCH_OBJ);

if($resultado != NULL) {
    $sql4 = "UPDATE `tb2_carrinhosalvo` SET `NR_Quantidade` = NR_Quantidade + 1 WHERE `NR_ProdutoID` = :produtoId and `FK_ClienteID` = :clienteId";
    $statement4 = $pdo->prepare($sql4);
    $statement4->bindParam(":produtoId", $produtoId);
    $statement4->bindParam(":clienteId", $clienteId);
    $statement4->execute();
} else {
    $sql1 = "INSERT INTO `tb2_carrinhosalvo` (`PK_CarrinhoSalvoID`, `FK_ClienteID`, `NR_ProdutoID`, `DT_CriadoEm`, `NR_Quantidade`) 
    VALUES (NULL, :clienteId, :produtoId, current_timestamp(), '1')";

    $statement1 = $pdo->prepare($sql1);
    $statement1->bindParam(":clienteId", $clienteId);
    $statement1->bindParam(":produtoId", $produtoId);
    $statement1->execute();
}

header("Location: carrinho.php");

?>