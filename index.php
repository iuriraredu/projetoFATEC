<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style media="screen">
    	/*** !important was needed for snippet ***/

		/* label focus color */
		.input-field input:focus + label, .materialize-textarea:focus:not([readonly]) + label{
			color: D50000 !important;
		}

		/* label underline focus color */
		.row .input-field input:focus, .materialize-textarea:focus:not([readonly]) {
			border-bottom: 1px solid #D50000 !important;
			box-shadow: 0 1px 0 0 #D50000 !important;
		}


		/* ------------------- */

		h5{
			text-transform: uppercase;
			text-shadow: 2px 2px 5px #c0c0c0;
			text-align: center;
			*/*font-size:150%;*/
		}

		#central {
			margin: 10% 20% 10% 20% !important;
			opacity : 0.8;
			background-color: transparent !important;
			color: #000;
			/*font-size:100%;*/
		}

		@media only screen and (max-width: 414px)  {
			#central {
				margin: 30% 20% auto 20% !important;
				opacity : 0.85;
				background-color: transparent !important;
				color: #000;
				/*font-size:100%;*/
			}
		}

		body {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
			/* background-image: url("Background_DotLine_01.png");*/
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
      <nav>
        <div class="nav-wrapper red accent-4">
          <!-- logo -->
          <a href="#" class="brand-logo center" style="text-shadow: 2px 2px 5px #c0c0c0"><i class="material-icons">event_note</i>SIC</a>
        </div>
      </nav>
    </header>
    <main id="central">
      <div class="container"  style="background-color: #fff">
        	<h5 style="text-align: center;" class="red-text text-accent-4">Bem-Vindo!</h5>
        <form method="POST" action="LoginUsuario.php">
          <div class="row">
            <div class="input-field col s12">
              <input id="inputEmail" type="email" class="validate" name="inputEmail">
              <label class="red-text text-accent-4" for="email">E-Mail</label>
            </div>
            <div class="input-field col s12">
              <input id="inputSenha" type="password" class="validate" name="inputSenha">
              <label class="red-text text-accent-4" for="password">Senha</label>
            </div>

            <?php
              if(isset($_SESSION['msgSenha'])){
                echo $_SESSION['msgSenha'];
                unset($_SESSION['msgSenha']);
              }
            ?>
            <div class="input-field col s12">
	            <button class="btn waves-effect waves-purple red accent-4 white-text col s12 btn-flat" type="submit" name="action">
		            Acessar
		            <!--  -->
		            <i class="material-icons right">power_settings_new</i>
		            <!--  -->
	            </button>
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer class="page-footer red accent-4">
      <div class="container">
	      <div class="row"style="text-shadow: 2px 2px 5px #c0c0c0; text-align: center;">
			© 2020 FATEC FRANCO DA ROCHA
	      </div>
      </div>
    </footer>
  </body>
</html>
