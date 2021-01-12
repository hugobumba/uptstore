<?php
	session_start();
	$conn = new PDO('mysql:host=localhost; dbname=uptstore',"root","");
	if (!isset($_SESSION['itens'])) {
		$_SESSION['itens'] = array();
	}
	if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
		$idProduto = $_GET['id'];
		if (!isset($_SESSION['itens'][$idProduto])) {
			$_SESSION['itens'][$idProduto] = 1;
		}else{
			$_SESSION['itens'][$idProduto] +=1;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPTS - Carrinho</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="myjs.js"></script>
		<link rel="stylesheet" type="text/css" href="./slick/slick.css">
	    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
	    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
	    <style>
	    	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
			body{
				margin: auto;
				font-family: Poppins;
			}
			header{
				width: 100%;
				height: 500px;
				background-image: url("img/pic9.jpg");/*back7; img2,3,7,9; pic1,9*/
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			nav{
				background-color: rgba(255,255,255,0);
				position: absolute;
				width: 100%;
				z-index: 2;
			}
			nav a{
				text-decoration: none;
				color: black;
				transition: 0.3s;
			}
			nav a:hover{
				color:#0475C2;
				transition: 0.3s;
			}
			.dropdown {
				position: relative;
				display: inline-block;
			}
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				padding: 12px 16px;
				z-index: 1;
				border-radius: 5px;
			}
			.dropdown:hover .dropdown-content {display: block;}
			#logo{
				position: relative;
				left: 0;
			}
			#logo img{
				width: 35px;
				height: 35px;
			}
			.navbar{
				position: relative;
				left: 15%;
			}
			nav li{
				display: inline;
				padding-left: 15px;
				padding-right: 15px;
			}
			#user, #counters{
				position: relative;
				left: 40%;
			}
			#counters a{padding: 5px;}
			#counters img{
				width: 20px;
				height: 20px;
			}
			#user img{
				width: 20px;
				height: 20px;
			}
			#pagename{
				position: absolute;
				top: 25%;
				left: 40%;
				text-align: center;
				font-size: 20px;
			}
			.title{
				width: 50%;
				text-align: left;
				padding-top: 40px;
				position: relative;
				left: 5%;
			}
			.title p{color: grey;}
			.title a{color: #82D5F6;}
			.title a:hover{color: blue;}
			#links{
				width: 100%;
				background-color: #C0C0C0;
			}
			#link{
				margin: auto;
				text-align: left;
				font-size: 13px;
			}
			#link img{width: 300px;}
			#link li{display: block;}
			#link h3{text-align: center;}
			#link a{
				text-decoration: none;
				color: black;
				transition: 0.3s;
			}
			#link a:hover{
				color: #0475C2;
				transition: 0.3s;
			}
			footer{
				background-color: #1B1B1B;
				padding: 5px;
			}
			footer p{
				text-align: center;
				color: white;
			}
			.row{display: flex;}
			.compras {
				border: 1px solid black;
				width: 60%;
				background: white;
				box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
				border-radius: 5px;
				display: flex;
				flex-direction: column;
				margin: auto;
			}
			.xtitle {
				border-bottom: 1px solid black;
				padding: 10px;
				color: #5E6977;
				font-size: 20px;
			}
			.item {
				padding: 20px;
				display: flex;
				border-bottom: 1px solid #E1E8EE;
			}
			.xbuttons {
				position: relative;
				padding-top: 30px;
				margin-right: 60px;
			}
			.xdelete-btn {
				display: inline-block;
				cursor: pointer;
				width: 20px;
				height: 17px;
				background: url("img/delete-icn.svg") no-repeat center;
				margin-right: 20px;
			}
			.gosto {
				position: absolute;
				top: 9px;
				left: 15px;
				display: inline-block;
				background: url('img/twitter-heart.png');
				width: 60px;
				height: 60px;
				background-size: 2900%;
				background-repeat: no-repeat;
				cursor: pointer;
			}
			.xis-active {
				animation-name: animate;
				animation-duration: .8s;
				animation-iteration-count: 1;
				animation-timing-function: steps(28);
				animation-fill-mode: forwards;
			}
			.ximage {margin-right: 50px;}
			.xdescription {
				padding-top: 10px;
				margin-right: 60px;
				width: 115px;
			}
			.xdescription span {
				display: block;
				font-size: 14px;
				color: #43484D;
			}
			.xdescription span:first-child {margin-bottom: 5px;}
			.xdescription span:last-child {
				margin-top: 10px;
				color: #86939E;
			}
			.xquantity {
				padding-top: 20px;
				margin-right: 60px;
			}
			.xquantity input {
				border: none;
				text-align: center;
				width: 30px;
				font-size: 15px;
				color: #43484D;
			}
			button[class*=btn] {
				width: 30px;
				height: 30px;
				background-color: #E1E8EE;
				border-radius: 6px;
				border: none;
				cursor: pointer;
			}
			.xminus-btn img { margin-bottom: 3px;}
			.xplus-btn img { margin-top: 2px;}
			button:focus, input:focus {outline:0;}
			.xtotal-price {
				width: 83px;
				padding-top: 27px;
				text-align: center;
				font-size: 15px;
				color: #43484D;
			}
			#container{
				display: flex;
				padding-bottom: 100px;
			}
			#sumario{
				margin: auto;
				height: 230px;
				top: 0;
				border-radius: 5px;
				width: 30%;
				position: relative;
				border: 1px solid black;
				padding: 10px;
			}
			#check-btn{
				background-color: black;
				color: white;
				position: relative;
				text-align: center;
				font-size: 20px;
				padding: 5px;
				transition: .3s;
			}
			#check-btn:hover{
				transition: .3s;
				border-radius: 5px;
				background-color: #0475C2;
				cursor: pointer;
			}
	    </style>
	</head>
	<body>
		<header>
			<nav id="nav">
				<ul id="menu">
					<li id="logo"><img src="img/upt.png"></li>
					<li class="navbar"><a href="index.php">Home</a></li>
					<li class="navbar dropdown"><a href="produtos.php">Produtos</a>
						<ul class="dropdown-content">
							<li><a href="#">Smartphones</a></li>
							<li><a href="#">Auriculares</a></li>
							<li><a href="#">Smartwatches</a></li>
							<li><a href="#">Acessórios</a></li>
						</ul>
					</li>
					<li class="navbar"><a href="contactos.php">Contactos</a></li>
					<li class="navbar"><a href="sobre.php">Sobre</a></li>
					<li id="counters">
						<a href="favoritos.php"><img src="img/heart.png"></a>
						<a href="carrinho.php"><img src="img/cart.png"></a>
					</li>
					<?php
						if (isset($_SESSION['email']) && $_SESSION['valid'] == TRUE) {
							if($_SESSION['tipo'] == 'admin'){
								echo '<li id="user" class="dropdown"><img src="img/user.png"><a href="produtos.php">'.$_SESSION["nome"].'</a>
									<ul class="dropdown-content">
										<li><a href="perfil.php">Perfil</a></li>
										<li><a href="admin.php?tipo=">Administração</a></li>
										<li><a href="adprod.php">Adicionar Item</a></li>
										<li><a href="logout.php">Sair</a></li>
									</ul>
								</li>';
							}else{
								echo '<li id="user" class="dropdown"><img src="img/user.png"><a href="produtos.php">'.$_SESSION["nome"].'</a>
									<ul class="dropdown-content">
										<li><a href="perfil.php">Perfil</a></li>
										<li><a href="favoritos.php">Favoritos</a></li>
										<li><a href="carrinho.php">Carrinho</a></li>
										<li><a href="logout.php">Sair</a></li>
									</ul>
								</li>';
							}
						}else{
							echo '<li id="user"><img src="img/user.png"><a href="login.php">Login</a>|<a href="registo.php">Registo</a></li>';
						}
					?>
				</ul>
			</nav>
			<div id="pagename">
				<h1>UPT Store</h1>
				<p>Todos amamos Tecnologia.</p>
			</div>
		</header>

		<div class="title">
			<h1>Carrinho</h1>
			<p>Veja os produtos que adicionou ao carrinho de compras</p>
		</div>
		<div id="container">
			<div class="compras">
				<div class="xtitle">CARRINHO</div>
				<?php
					if (count($_SESSION['itens']) == 0) {
						$_SESSION['total'] = 0;
						$_SESSION['shipp'] = 0;
						echo '
							<div class="title">
								<h1>Nenhum produto no carrinho, <a href="produtos.php">veja alguns produtos</a>.</h1>
							</div>
						';
					}else{
						$_SESSION['total'] = 0;
						$_SESSION['shipp'] = 0;
						foreach ($_SESSION['itens'] as $idProduto => $quant) {
						$sql = $conn->prepare("SELECT * FROM produtos WHERE id=?");
						$sql->bindParam(1,$idProduto);
						$sql->execute();
						$produtos = $sql->fetchAll();
						$_SESSION['total'] = $_SESSION['total'] + ($quant * $produtos[0]['preco']);
						$_SESSION['shipp'] = 10;
						echo '
							<div class="item">
								<div class="xbuttons">
									<span class="xdelete-btn"></span>
									<span class="gosto"></span>
								</div>
								<div class="ximage">
									<img src="img/produtos/'.$produtos[0]["imagem"].'.jpg" width="100px">
								</div>
								<div class="xdescription">
									<span>'.$produtos[0]["nome"].'</span>
									<span>'.$produtos[0]["tipo"].'</span>
									<span>'.$produtos[0]["cor"].'</span>
								</div>
								<div class="xquantity">
									<button class="xplus-btn" type="button" name="button">
										<img src="img/plus.svg">
									</button>
									<input type="text" name="name" value="'.$quant.'">
										<a href="remover.php?remover=carrinho&id='.$idProduto.'"><img src="img/minus.svg"></a>
								</div>
								<div class="xtotal-price">'.number_format($produtos[0]["preco"] * $quant,2,',','.').'€</div>
							</div>
						';
						}
					}
				?>
			</div>
			<div id="sumario">
				<div class="xtitle">SUMÁRIO</div>
				<table style="padding-top: 20px;">
					<tr>
						<td><b>Subtotal:</b></td>
						<td><?php echo number_format($_SESSION['total'],2,',','.'); ?>€</td>
					</tr>
					<tr>
						<td><b>Shipping:</b></td>
						<td><?php echo number_format($_SESSION['shipp'],2,',','.'); ?>€</td>
					</tr>
					<tr>
						<td><b>Total:</b></td>
						<td><?php echo number_format($_SESSION['total'] + $_SESSION['shipp'],2,',','.'); ?>€</td>
					</tr>
					<tr><td><i>IVA Incluído*</i></td></tr>
				</table>
				<div id="check-btn"><a href="pagamento.php" style="color: white;">Pagamento</a></div>
			</div>
		</div>

		<!--LINKS-->
		<div id="links" class="row">
			<div id="link">
				<h3>UPT Store</h3>
				<img src="img/logo.png">
			</div>
			<div id="link">
				<h3>Links</h3>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Produtos</a></li>
					<li><a href="#">Contactos</a></li>
					<li><a href="#">Sobre</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Informações</h3>
				<ul>
					<li><a href="#">Mapa do site</a></li>
					<li><a href="#">Legal</a></li>
					<li><a href="#">Reembolsos</a></li>
					<li><a href="#">Termos de uso</a></li>
					<li><a href="#">Política de privacidade</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
			<div id="link">
				<h3>Serviços</h3>
				<ul>
					<li><a href="#">Pagamentos</a></li>
					<li><a href="#">Suporte</a></li>
					<li><a href="#">Entregas</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
					<li><a href="#">&nbsp;</a></li>
				</ul>
			</div>
		</div>		
		<footer>
			<p>UPT Store © 2019. Todos os direitos reservados | by UPTS</p>
		</footer>
		<script>
			$('.xminus-btn').on('click', function(e) {
				e.preventDefault();
				var $this = $(this);
				var $input = $this.closest('div').find('input');
				var value = parseInt($input.val());
				if (value > 1) {
					value = value - 1;
				} else {
					value = 0;
				}
				$input.val(value);
			});
			$('.xplus-btn').on('click', function(e) {
				e.preventDefault();
				var $this = $(this);
				var $input = $this.closest('div').find('input');
				var value = parseInt($input.val());
				if (value < 100) {
					value = value + 1;
				} else {
					value =100;
				}
				$input.val(value);
			});
			$('.gosto').on('click', function() {
				$(this).toggleClass('is-active');
			});
		</script>
	</body>
</html>