<?php
	session_start();

	if (empty($_SESSION['idUsuario'])){
		header("Location: index.php"); // retorna pagina de login
	}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Mensagem</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style media="screen">
			/*** !important was needed for snippet ***/

			/* label focus color */
			.input-field input:focus+label, .materialize-textarea:focus:not([readonly])+label
				{
				color: D50000 !important;
			}

			/* label underline focus color */
			.row .input-field input:focus, .materialize-textarea:focus:not([readonly])
				{
				border-bottom: 1px solid #D50000 !important;
				box-shadow: 0 1px 0 0 #D50000 !important;
			}

			/* ------------------- */
			i {
				font-size: 80%;
			}

			h5 {
				text-transform: uppercase;
				text-shadow: 2px 2px 5px #c0c0c0;
				text-align: center;
				* /*font-size:150%;*/
			}

			#central {
				margin: 10% 20% 10% 20% !important;
				opacity: 0.8;
				background-color: transparent !important;
				color: #000;
				/*font-size:100%;*/
			}

			@media only screen and (max-width: 414px) {
				#central {
					margin: 30% 20% auto 20% !important;
					opacity: 0.8;
					background-color: transparent !important;
					color: #000;
					/*font-size:100%;*/
				}
			}

			body {
				display: flex;
				min-height: 100vh;
				flex-direction: column;
				background-image: url("Background_DotLine_01.png");
				background-repeat: repeat;
				background-attachment: fixed;
			}

			main {
				flex: 1 0 auto;
			}
		</style>
	</head>
	<body class="grey.lighten-5">
		<header>
			<!-- Page Content goes here -->
			<nav>
				<div class="nav-wrapper red accent-4 r">
					<!-- logo -->
					<a href="#" class="brand-logo center" style="text-shadow: 2px 2px 5px #c0c0c0">
						<i class="material-icons">event_note</i> SIC
					</a>
					<!-- Menu Mobile -->
					<!-- a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a -->
					<a href="#" data-activates="menu-mobile"class="sidenav-trigger button-collapse">
						<i class="material-icons">menu</i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="Home.php">Avisos</a></li>
						<li><a href="Cadastro.php">Cadastro</a></li>
						<li class="active"><a href="#">Mensagens</a></li>
						<!--li><a href="#">Carona Amiga</a></li-->
						<li><a href="CadastrarNovoUsario.php">Cadastrar Novo Usuário</a></li>
						<li><a href="index.php"><i class="material-icons right">power_settings_new</i>Sair</a></li>
					</ul>
					<ul class="side-nav" id="menu-mobile">
						<li><a href="Home.php"><i class="material-icons">announcement</i>Avisos</a></li>
						<li><a href="Cadastro.php"><i class="material-icons">person</i>Cadastro</a></li>
						<li class="active"><a href="#"><i class="material-icons">message</i>Mensagens</a>
						</li>
						<!-- li><a href="#"><i class="material-icons">directions_car</i>Carona Amiga</a></li-->
						<li><a href="CadastrarNovoUsario.php"><i class="material-icons">person_add</i>Cadastrar Novo Usuário</a></li>
						<li><div class="divider"></div></li>
						<li><a href="index.php"><i class="material-icons center">power_settings_new</i>Sair</a></li>
					</ul>
				</div>
			</nav>
			<script>
				$(function(){
					$(".button-collapse").sideNav();
				});
			</script>
		</header>
		<main>
			<div class="container">
				<form>
					<div class="row">
						<div class="col s12">
							<div class="card grey.lighten-5">
								<div class="card-content white-text">
									<span class="card-title red-text text-accent-4">User_Enviou_Mensagem</span>
								</div>
								<div class="card-action">
									<div class="row">
										<div class="col s10 right">
											<div class="card-panel red lighten-5">
												<p>oi</p>
												<i>Data: 00-00-00 00:00</i>
											</div>
										</div>
										<div class="col s10 left">
											<div class="card-panel red lighten-1">
												<p>
												Oi<br />tudo bem?
												</p>
												<i>Data: 00-00-00 00:00</i>
											</div>
										</div>
										<div class="col s10 right">
											<div class="card-panel red lighten-5">
												<p>estou bem e você?</p>
												<i>Data: 00-00-00 00:00</i>
											</div>
										</div>
										<div class="col s10 left">
											<div class="card-panel red lighten-1">
												<p>tudo bem também</p>
												<i>Data: 00-00-00 00:00</i>
											</div>
										</div>
									</div>
									<div class="card-action">
										<div>
											<div class="row input-field">
												<textarea id="textarea1" class="materialize-textarea col s10"></textarea>
												<label class="red-text text-accent-4" for="textarea1">Escreva Sua Mensagem</label>
												<button class="btn waves-effect waves-light right  red accent-4 r col s2" type="submit" name="action">
													<i class="material-icons left">send</i>Enviar
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</main>
		<footer class="page-footer red accent-4 r">
			<div class="container">
				<div class="row" style="text-shadow: 2px 2px 5px #c0c0c0; text-align: center;">
				© 2020 FATEC FRANCO DA ROCHA
				</div>
			</div>
		</footer>
	</body>
</html>
