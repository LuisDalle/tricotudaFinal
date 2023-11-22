<?php 
	
	include 'layout/imports.php';
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(!isset($_SESSION['usuario'])){
        header("Location: telaLoginTeste.php?mensagem='É necessário estar logado para acessar o Carrinho!'");
    }
	include 'layout/header.php';
	include "conexao.php";
	
?>

<!DOCTYPE html>
<html lang=pt-br">
<head>
	<title>Carrinho - Tricotuda</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="animsition">
<br><br><br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Carrinho
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Produto</th>
									<th class="column-2"></th>
									<th class="column-3">Preço</th>
									<th class="column-4">Quantidade</th>
									<th class="column-5">Total</th>
								</tr>
								
								<?php 
														
								
								$idUsuario = $_SESSION['usuario']->PK_ClienteID;
								$sql = "SELECT NR_ProdutoID FROM tb2_carrinhosalvo WHERE FK_ClienteID = :id";
								$statement = $pdo->prepare($sql);
								$statement->bindParam(":id", $idUsuario);
								$statement->execute();
								$todosIds = $statement->fetchAll(PDO::FETCH_OBJ);
								
								 // Adicionar itens no carrinho // ainda nao ta funcionando
								if(isset($_REQUEST['produtoId'])) {
									$idUsuario = $_SESSION['usuario']->PK_ClienteID;
									$addProdutoId = $_REQUEST['produtoId'];
									$sql1 = "INSERT INTO `tb2_carrinhosalvo` (`PK_CarrinhoSalvoID`, `FK_ClienteID`, `NR_ProdutoID`, `DT_CriadoEm`, `NR_Quantidade`) 
									VALUES (NULL, ;idUsuario, :idProduto, current_timestamp(), 1);";
									$statement1 = $pdo->prepare($sql1);
									$statement1->bindParam(":idUsuario", $idUsuario);
									$statement1->bindParam(":idProduto", $addProdutoId);
									$statement1->execute();
									$status = $statement1->fetchAll(PDO::FETCH_OBJ);
									echo $status;
								}
								
								
								$teste = [1,2,3,4,5];
								$precoFinal = 0;
								?>
								<?php foreach ($todosIds as $array) { ?>

								<?php			
									$sql5 = "SELECT TX_CaminhoImagem FROM tb15_produtos WHERE PK_ProdutoID = :id";
									$statement5 = $pdo->prepare($sql5);
									$statement5->bindParam(":id", $array->NR_ProdutoID);
									$statement5->execute();
									$caminhoProduto = $statement5->fetch(PDO::FETCH_OBJ);
									//echo $caminhoProduto->TX_CaminhoImagem;
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo $caminhoProduto->TX_CaminhoImagem;?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"> <!-- NOME -->
									<?php
										
										$sql = "SELECT TX_NOME FROM tb15_produtos WHERE PK_ProdutoID = :id";
										$statement = $pdo->prepare($sql);
										$statement->bindParam(":id", $array->NR_ProdutoID);
										$statement->execute();
										$resultado = $statement->fetch(PDO::PARAM_STR);
										
										echo implode("",$resultado);
										
									?>
									</td> 
									<td class="column-3">R$ <!-- PREÇO DA PEÇA -->
									<?php
										$sql = "SELECT NR_Preco FROM tb15_produtos WHERE PK_ProdutoID = :id";
										$statement = $pdo->prepare($sql);
										$statement->bindParam(":id", $array->NR_ProdutoID);
										$statement->execute();
										$resultado = $statement->fetch(PDO::PARAM_STR);
										
										echo implode("",$resultado);
										$valorIndividual = implode("",$resultado);
									?>
									</td> 
									
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<!-- Diminuir QNTD -->
											<a href="diminuir.php?id=<?php echo $array->NR_ProdutoID ?>&ope=-1" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" >
												<i class="fs-16 zmdi zmdi-minus"></i>
											</a>

											<!-- QNTD ITEM -->
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="<?php 
												$sql = "SELECT NR_Quantidade FROM tb2_carrinhosalvo WHERE NR_ProdutoID = :id";
												$statement = $pdo->prepare($sql);
												$statement->bindParam(":id", $array->NR_ProdutoID);
												$statement->execute();
												$resultado = $statement->fetch(PDO::PARAM_STR);
												echo implode("",$resultado);
												$qntd = implode("",$resultado);
											 ?>"> 

											<!-- Aumentar QNTD -->
											<a href="diminuir.php?id=<?php echo $array->NR_ProdutoID ?>&ope=1" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</a>
										</div>
									</td>
									<td class="column-5">R$ <?php 
									$precoTotal = $qntd*$valorIndividual;
									$precoFinal = $precoFinal + $precoTotal;
									echo number_format((float)$precoTotal, 2, '.', '');;?>
									</td> <!-- PREÇO TOTAL -->
								</tr>

								<?php } ?>
							</table>
						</div>

						

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Cupom de Desconto">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Aplicar cupom
								</div>
							</div>

							
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total do Carrinho
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									R$ <?php echo number_format((float)$precoFinal, 2, '.', '');;?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Envio:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Não há nenhum método de envio disponível. Por favor, verifique seu endereço ou contate-nos se necessitar de alguma ajuda.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Frete
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Selecione o Estado</option>
											<option>DF</option>
											<option>SP</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="CEP">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Endereço">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Número">
									</div>									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Calcular Frete
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									R$ <?php echo number_format((float)$precoFinal, 2, '.', '');;?>
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Prosseguir para Pagamento
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php 
	include 'layout/footer.php';
	include 'layout/backToTop.php';
	//include 'layout/modal1.php';
?>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>