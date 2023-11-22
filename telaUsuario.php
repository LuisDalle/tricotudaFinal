<?php

include "conexao.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: telaLoginTeste.php");
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

$id = $dadosPessoais->PK_ClienteID;
$senha = $dadosPessoais->TX_Senha; 
$nome = $dadosPessoais->TX_Nome;
$CEP = $dadosPessoais->NM_CEP;
$endereco = $dadosPessoais->TX_Endereco;
$numero = $dadosPessoais->NM_Numero;


include 'layout/imports.php';
include 'layout/header.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">


    <title>Seu Perfil - Tricotuda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/telaUsuario.css">
    <style type="text/css">
        body {
            margin-top: 0px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <br> <br> <br> <br> <br>
    <div class="container">



        <div class="row gutters-sm">
            <div class="col-md-4 d-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                            <a href="#profile" data-toggle="tab"
                                class="nav-item nav-link has-icon nav-link-faded active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user mr-2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>Perfil
                            </a>
                            <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings mr-2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>Deletar Conta
                            </a>
                            <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shield mr-2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>Segurança
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-flex d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-shield">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-credit-card">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="profile">
                            <h6>SUAS INFORMAÇÕES</h6> 
                            <p style="color: #EF3B3A;">
                            <?php 
                                if(isset($_REQUEST['mensagem'])) {
                                    $mensagem = $_REQUEST['mensagem'];
                                    echo $mensagem;
                                }
				            ?>
                            </p>
                            <hr>
                            <form method="GET" action="registroTeste.php">
                                <div class="form-group">
                                    <label for="fullName">Nome</label>
                                    <input type="hidden" name="update" value=1>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- id escondido -->
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        aria-describedby="fullNameHelp" value="<?php echo $nome; ?>">
                                    <small id="fullNameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="fullName">Email</label>
                                    <input type="text" name="email" class="form-control"  id="email"
                                        aria-describedby="fullNameHelp" value="<?php echo $email; ?>">
                                    <small id="fullNameHelp" class="form-text text-muted">Após alterar este campo é necessário relogar!</small>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="fullName">CEP</label>
                                    <input type="text" name="cep" class="form-control" id="cep"
                                        aria-describedby="fullNameHelp" value="<?php echo $CEP; ?>">
                                    <small id="fullNameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="fullName">Endereço</label>
                                    <input type="text" name="endereco" class="form-control" id="logradouro"
                                        aria-describedby="fullNameHelp" value="<?php echo $endereco; ?>">
                                    <small id="fullNameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="fullName">Número da Casa</label>
                                    <input type="text" name="numero" class="form-control" id="numeroCasa"
                                        aria-describedby="fullNameHelp" value="<?php echo $numero; ?>">
                                    <small id="fullNameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group small text-muted">
                                    Todos os campos podem ser alterados a qualquer momento!
                                </div>
                                
                                <input type="submit" class="btn btn-primary" id="atualizar" value="Atualizar Informações"></input>
                                
                            </form>
                        </div>
                        <div class="tab-pane" id="account">
                            <h6>DELETAR CONTA</h6>
                            <hr>
                            <form action="deletar.php?id=<?php echo $id?>" method="GET">
                                <div class="form-group">
                                    <label class="d-block text-danger">Deletar Conta</label>
                                    <p class="text-muted font-size-sm">Ao deletar sua conta, não há volta. Essa ação é
                                        definitiva. Tome cuidado!</p>
                                </div>
                                <button type="submit" name="id" id="deleteId" class="btn btn-danger" value=<?php echo $id?>>Deletar Conta</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="security">
                            <h6>Segurança</h6>
                            <hr>
                            <form action="alteraSenha.php">
                                <div class="form-group">
                                    <label class="d-block">Mudar Senha</label>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="senhaBancoAntiga" id="senhaBancoAntiga" value="<?php echo $senha; ?>">
                                    <input required type="password" name="senhaAntiga" class="form-control" placeholder="Entre com a sua senha antiga">
                                    <input required type="password" name="senha" id="senha "class="form-control mt-1" placeholder="Nova Senha">
                                    <input required type="password" name="confirmarSenha" id="confirmarSenha" class="form-control mt-1" placeholder="Confirma Nova Senha">
                                    <br>
                                    <button class="btn btn-info" type="submit">Aplicar Mudança</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var senha = document.getElementById("senha")
        , confirmarSenha = document.getElementById("confirmarSenha");

        function validatePassword(){
        if(senha.value != confirmarSenha.value) {
            confirmarSenha.setCustomValidity("As senhas não batem!");
        } else {
            confirmarSenha.setCustomValidity('');
        }
        }

        senha.onchange = validatePassword;
        confirmarSenha.onkeyup = validatePassword;
    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>