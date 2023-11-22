<?php
include 'conexao.php';
if (isset($_REQUEST['id'])) {
    $idProduto = $_REQUEST['id'];
} else {
    echo "nao pégoui o id";
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sql9 = "select * from tb4_clientes
            where TX_Email = :email and
                    TX_Senha = :senha";

$email = $_SESSION['usuario']->TX_Email;
$senha = $_SESSION['usuario']->TX_Senha;

$statement9 = $pdo->prepare($sql9);
$statement9->bindParam(":email", $email);
$statement9->bindParam(":senha", $senha);
$statement9->execute();
$dadosPessoais = $statement9->fetch(PDO::FETCH_OBJ);

$clienteId = $dadosPessoais->PK_ClienteID;

$ope = $_REQUEST['ope'];
if ($ope == -1) {
    $sql = "UPDATE `tb2_carrinhosalvo` SET `NR_Quantidade` = NR_Quantidade - 1 WHERE `NR_ProdutoID` = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $idProduto);
    $statement->execute();
    $resultado = $statement->fetch(PDO::PARAM_STR);
}
if ($ope == 1) {
    $sql = "UPDATE `tb2_carrinhosalvo` SET `NR_Quantidade` = NR_Quantidade + 1 WHERE `NR_ProdutoID` = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $idProduto);
    $statement->execute();
    $resultado = $statement->fetch(PDO::PARAM_STR);
}

$sql0 = "SELECT NR_Quantidade from tb2_carrinhosalvo WHERE FK_ClienteID = :clienteId and NR_ProdutoID = :produtoId";
$statement0 = $pdo->prepare($sql0);
$statement0->bindParam(":clienteId", $clienteId);
$statement0->bindParam(":produtoId", $idProduto);
$statement0->execute();
$valorQntd = $statement0->fetch(PDO::FETCH_OBJ);
echo "valorQntd: ";
$valorQntd = $valorQntd->NR_Quantidade;
echo $valorQntd;

if ($valorQntd == 0) {
    $sql2 = "DELETE FROM tb2_carrinhosalvo WHERE FK_ClienteID = :clienteId and NR_ProdutoID = :produtoId";
    $statement2 = $pdo->prepare($sql2);
    $statement2->bindParam(":clienteId", $clienteId);
    $statement2->bindParam(":produtoId", $idProduto);
    $statement2->execute(); 
    $resultDelete = $statement2->fetchAll(PDO::FETCH_OBJ);
    echo "resultDelete: ";
    var_dump($resultDelete);

}

header("Location: carrinho.php")
?>