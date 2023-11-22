<!-- Product -->

<div class="bg0 m-t-23 p-b-140">
    <br><br>
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				

				<div class="flex-w flex-c-m m-tb-10">
					
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Busca
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>
			</div>

			<?php 
			include "conexao.php";
			$valor = 2;
			$aumento = 0;
			$id = 1;
			if (isset($_REQUEST['aumento'])) {
				$aumento = $_REQUEST['aumento'];
			} 
			
			?>
			<div class="row isotope-grid">
				<?php 

				$sql = "SELECT PK_ProdutoID FROM tb15_produtos";
				$statement = $pdo->prepare($sql);
				$statement->execute();
				$todosIds = $statement->fetchAll(PDO::FETCH_OBJ);

				foreach ($todosIds as $array) { ?>
				
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<?php			
								$sql5 = "SELECT TX_CaminhoImagem FROM tb15_produtos WHERE PK_ProdutoID = :id";
								$statement5 = $pdo->prepare($sql5);
								$statement5->bindParam(":id", $array->PK_ProdutoID);
								$statement5->execute();
								$caminhoProduto = $statement5->fetch(PDO::FETCH_OBJ);
								//echo $caminhoProduto->TX_CaminhoImagem;
							?>
							<img src="<?php echo $caminhoProduto->TX_CaminhoImagem;?>" alt="IMG-PRODUCT">

							<a href="adicionaCarrinho.php?produtoId=<?php echo $array->PK_ProdutoID ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Comprar
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php
										
										$sql = "SELECT TX_NOME FROM tb15_produtos WHERE PK_ProdutoID = :id";
										$statement = $pdo->prepare($sql);
										$statement->bindParam(":id", $array->PK_ProdutoID);
										$statement->execute();
										$resultado = $statement->fetch(PDO::PARAM_STR);
										
										echo implode("",$resultado);
										
									?>
								</a>
								

								<span class="stext-105 cl3">
									R$
									<?php
										$sql = "SELECT NR_Preco FROM tb15_produtos WHERE PK_ProdutoID = :id";
										$statement = $pdo->prepare($sql);
										$statement->bindParam(":id", $array->PK_ProdutoID);
										$statement->execute();
										$resultado = $statement->fetch(PDO::PARAM_STR);
										
										echo implode("",$resultado);
									?>

								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<!-- aqui jaz o coraçãozinho -->
							</div>
						</div>
					</div>
				</div>

				<?php } $id = $id + 1;?>
			</div>
			