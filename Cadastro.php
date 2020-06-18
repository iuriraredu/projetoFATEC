<?php
	session_start();

	if (empty($_SESSION['idUsuario'])){
		header("Location: index.php"); // retorna pagina de login
	}
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
						<!--li><a href="#">Carona Amiga</a></li-->
						<li><a href="CadastrarNovoUsario.php">Cadastrar Novo Usuário</a></li>
						<li><a href="LogoutUsuario.php"><i class="material-icons right">power_settings_new</i>Sair</a></li>
					</ul>
					<ul class="side-nav" id="menu-mobile">
						<li><a href="Home.php"><i class="material-icons">announcement</i>Avisos</a></li>
						<li class="active"><a href="#"><i class="material-icons">person</i>Cadastro</a></li>
						<li><a href="Mensagem.php"><i class="material-icons">message</i>Mensagens</a></li>
						<!-- li><a href="#"><i class="material-icons">directions_car</i>Carona Amiga</a></li-->
						<li><a href="CadastrarNovoUsario.php"><i class="material-icons">person_add</i>Cadastrar Novo Usuário</a></li>
						<li><div class="divider"></div></li>
						<li><a href="LogoutUsuario.php"><i class="material-icons center">power_settings_new</i>Sair</a></li>
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
				<form method="POST" action="AtualizarCadastro.php">
					<div class="row">
						<div class="col s12">
							<div class="card grey.lighten-5">
								<div class="card-content black-text">
									<span class="btn-floating waves-effect waves-light red accent-4 right"	onclick="habilitaEdicao()">
										<i class="large material-icons">mode_edit</i>
									</span>
									<script>
									 function habilitaEdicao(){
										 document.getElementById("inputNomeCompleto").disabled = (document.getElementById("inputNomeCompleto").disabled) ? false: true;
										 document.getElementById("inputEmail").disabled = (document.getElementById("inputEmail").disabled) ? false: true;
										 document.getElementById("inputSenha").disabled = (document.getElementById("inputSenha").disabled) ? false: true;
										 document.getElementById("inputConfirmaSenha").disabled = (document.getElementById("inputConfirmaSenha").disabled) ? false: true;
										 document.getElementById("inputCaronaAmiga").disabled = (document.getElementById("inputCaronaAmiga").disabled) ? false: true;
										 document.getElementById("inputTipoUsuario").disabled = (document.getElementById("inputTipoUsuario").disabled) ? false: true;
										 document.getElementById("btnSalvar").disabled = (document.getElementById("btnSalvar").disabled) ? false: true;
									 }
									</script>
									<span class="card-title red-text text-accent-4">
										<b><?php echo $_SESSION['nomeUsuario'];?></b>
										<?php
											if(isset($_SESSION['msgAtlCad'])){
												echo $_SESSION['msgAtlCad'];
												unset($_SESSION['msgAtlCad']);
											}
										?>
									</span>
									<br />
									<div class="card-action row">
										<div class="row">
											<div class="input-field col s12">
												<input disabled id="inputNomeCompleto" type="text" class="validate" name="inputNomeCompleto" value="<?=$_SESSION['nomeUsuario']?>"/>
												<label class="red-text text-accent-4" for="full_name">Nome Completo</label>
											</div>
											<div class="input-field col s12">
												<input disabled id="inputEmail" type="email" class="validate" name="inputEmail" value="<?=$_SESSION['eMail'] ?>"/>
												<label class="red-text text-accent-4" for="email">E-mail</label>
											</div>
											<div class="input-field col s6">
												<input disabled id="inputSenha" type="password" class="validate" name="inputSenha" value=""/>
												<label class="red-text text-accent-4" for="password">Senha</label>
											</div>
											<div class="input-field col s6">
												<input disabled id="inputConfirmaSenha" type="password" class="validate" name="inputConfirmaSenha" value=""/>
												<label class="red-text text-accent-4" for="password">Confirma Senha</label>
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
														<input disabled id="inputCaronaAmiga" type="checkbox" name="inputCaronaAmiga" <?php echo $_SESSION['caronaAmiga'] == 1 ? 'checked': 'unchecked';?> />
														<span class="lever"></span>
														Sim
													</label>
												</div>
											</span>
											<div class="col s6">
												<label class="red-text text-accent-4">Tipo de Usuário</label>
												<select disabled class="browser-default" name="inputTipoUsuario" id="inputTipoUsuario">
													<option value="" disabled selected>Selecione o Tipo</option>
													<option value="1" <?php echo $_SESSION['Usuario_TIPO']  == 1 ? 'selected'	: '';?>>Aluno</option>
													<option value="2" <?php echo $_SESSION['Usuario_TIPO']  == 2 ? 'selected'	: '';?>>Coordenador</option>
													<option value="3" <?php echo $_SESSION['Usuario_TIPO']  == 3 ? 'selected'	: '';?>>Diretoria</option>
													<option value="4" <?php echo $_SESSION['Usuario_TIPO']  == 4 ? 'selected'	: '';?>>Professor</option>
													<option value="5" <?php echo $_SESSION['Usuario_TIPO']  == 5 ? 'selected'	: '';?>>Secretaria</option>
												</select>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button disabled class="btn waves-effect waves-purple red accent-4 white-text col s12 btn-flat" type="submit" name="btnSalvar" id="btnSalvar">Salvar</button>
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
