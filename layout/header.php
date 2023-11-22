<!-- Header -->
<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<a href="logout.php">@tricotuda</a>
					</div>


					<div class="right-top-bar flex-w h-full">
						
						<p href="#" class="flex-c-m trans-04 p-lr-25">
							<?php
							//if (session_status() == PHP_SESSION_NONE) {
							//	session_start();
							//}
							if (isset($_SESSION['usuario'])) {
								echo $_SESSION['usuario']->TX_Email;
							}
							?>
						</p>
						
						<a href="telaUsuario.php" class="flex-c-m trans-04 p-lr-25">
							Minha Conta
						</a>
						
						<a href="logout.php" class="flex-c-m trans-04 p-lr-25">
							Sair
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="img/icons/logo_03.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
								
							</li>

							<li>
								<a href="product.php">Loja</a>
							</li>

							<li>
								<a href="about.php">Sobre Nós</a>
							</li>

							<li>
								<a href="contact.php">Contato</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti " href="carrinho.php" data-notify="#">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="img/icons/logo_01.jpg" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="#">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
					<a href="logout.php">@tricotuda</a>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						

						<a href="telaLoginTeste.php" class="flex-c-m p-lr-10 trans-04">
							Minha Conta
						</a>

						<a href="logout.php" class="flex-c-m p-lr-10 trans-04">
							Sair
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Tricotuda - Home</a>
					
					
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Loja</a>
				</li>

				<li>
					<a href="about.php">Sobre Nós</a>
				</li>

				<li>
					<a href="contact.php">Contato</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Busca">
				</form>
			</div>
		</div>
	</header>