<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Cadastro</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style media="screen">
      /** !important was needed for snippet ***/

			/* label focus color */
			.input-field input:focus+label, .materialize-textarea:focus:not([readonly])+label {
				color: D50000 !important;
			}

			/* label underline focus color */
			.row .input-field input:focus, .materialize-textarea:focus:not([readonly]) {
				border-bottom: 1px solid #D50000 !important;
				box-shadow: 0 1px 0 0 #D50000 !important;
			}

			/* ------------------- */
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
				<div class="nav-wrapper red accent-4">
					<!-- logo -->
					<a href="#" class="brand-logo center" style="text-shadow: 2px 2px 5px #c0c0c0"><i class="material-icons">event_note</i>SIC</a>
					<!-- Menu Mobile -->
					<!-- a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a -->
					<a href="#" data-activates="menu-mobile" class="sidenav-trigger button-collapse"><i class="material-icons">menu</i></a>

					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="Home.php">Avisos</a></li>
						<li class="active"><a href="#">Cadastro</a></li>
						<li><a href="Mensagem.php">Mensagens</a></li>
						<li><a href="#">Carona Amiga</a></li>
						<li><a href="index.php"><i class="material-icons right">power_settings_new</i>Sair</a></li>
					</ul>
					<ul class="side-nav" id="menu-mobile">
						<li><a href="Home.php"><i class="material-icons">announcement</i>Avisos</a></li>
						<li class="active"><a href="#"><i class="material-icons">person</i>Cadastro</a></li>
						<li><a href="Mensagem.php"><i class="material-icons">message</i>Mensagens</a></li>
						<li><a href="#"><i class="material-icons">directions_car</i>Carona Amiga</a></li>
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
				<form method="POST" action="CadastraUsuario.php">
					<div class="row">
						<div class="col s12">
							<div class="card grey.lighten-5">
								<div class="card-content black-text">
									<button class="btn-floating waves-effect waves-light red accent-4 right disabled">
										<i class="large material-icons">mode_edit</i>
									</button>
									<span class="card-title red-text text-accent-4">
										<b>User_Pessoas</b>
										<?php
											if(isset($_SESSION['msg'])){
												echo $_SESSION['msg'];
												unset($_SESSION['msg']);
											}
										?>
									</span>
									<br />
									<div class="card-action row">
										<div class="row">
											<div class="input-field col s12">
												<input id="inputNomeCompleto" type="text" class="validate" name="inputNomeCompleto" />
												<label class="red-text text-accent-4" for="full_name">Nome Completo</label>
											</div>
											<div class="input-field col s12">
												<input id="inputEmail" type="email" class="validate" name="inputEmail"/>
												<label class="red-text text-accent-4" for="email">E-mail</label>
											</div>
											<div class="input-field col s12">
												<input id="inputSenha" type="password" class="validate" name="inputSenha"/>
												<label class="red-text text-accent-4" for="password">Senha</label>
											</div>
											<div class="input-field col s6">
												<input disabled value="Curso" id="curso" type="text" class="validate"/>
												<label class="red-text text-accent-4" for="curso">Curso</label>
											</div>
											<div class="input-field col s6">
												<input disabled value="Turma" id="turma" type="text" class="validate"/>
												<label  class="red-text text-accent-4" for="turma">Turma</label>
											</div>
											<span class="red-text text-accent-4 col s6">
												Deseja Participar do Carona Amiga?
												<!--p class="col s12">
													<input name="group1" type="radio" id="caronasim" />
													<label class="red-text text-accent-4" for="caronasim">Sim</label>
												</p>
												<p class="col s12">
													<input name="group1" type="radio" id="caronanao" />
													<label class="red-text text-accent-4" for="caronanao">Não</label>
												</p-->
												<div class="switch">
													<label>
														Não
														<input id="inputCaronaAmiga" type="checkbox" name="inputCaronaAmiga" />
														<span class="lever"></span>
														Sim
													</label>
												</div>
											</span>
											<div class="col s6">
												<label class="red-text text-accent-4">Tipo de Usuário</label>
												<select class="browser-default" name="inputTipoUsuario">
													<option value="" disabled selected>Selecione o Tipo</option>
													<option value="1">Aluno</option>
													<option value="2">Coordenador</option>
													<option value="3">Diretoria</option>
													<option value="4">Professor</option>
													<option value="5">Secretaria</option>
												</select>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button class="btn waves-effect waves-purple red accent-4 white-text col s12 btn-flat" type="submit" name="action">Salvar</button>
										<br />
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
