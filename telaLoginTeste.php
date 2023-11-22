<?php

include 'layout/imports.php';
include 'layout/header.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/loginTeste.css">
	<title>Login - Tricotuda</title>
</head>
<body>
	
	<div class="login-page">
		<div class="form">
			
			<form method = "post" action="registroTeste.php?criar=1" class="register-form" >
				<input required type="text" placeholder="nome" name="nome"/>
				<input required type="text" placeholder="email" name="email"/>
				<input required type="text" placeholder="CEP" name="cep"/>
				<input required type="password" placeholder="senha" name="senha" id="senha"/>
				<input required type="password" placeholder="confirmar senha" name="confirmarSenha" id="confirmarSenha"/>
				  
				<button type="submit">criar</button>
				<p class="message">Já tem uma conta? <a href="#">Login</a></p>
			</form>
			<form method = "post" action="login.php" class="login-form">
				<input required type="text" placeholder="email" name="email"/>
				<input required type="password" placeholder="senha" name="senha"/>
				<button type="submit">login</button>
				<p class="message">Ainda não tem uma conta? <a href="#">Crie sua conta</a></p>
				<br>
				<p style="color: #EF3B3A;">
				<?php 
					if(isset($_REQUEST['mensagem'])) {
						$mensagem = $_REQUEST['mensagem'];
						echo $mensagem;
					}
				?>
				</p>
			</form>
		</div>
	</div>

</body>

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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script id="rendered-js">
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</html>