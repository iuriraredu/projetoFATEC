<?php
	session_start(); // inicia php
	unset( // destroi as variaveis
		$_SESSION['idUsuario'],
		$_SESSION['nomeUsuario'],
		$_SESSION['eMail'],
		$_SESSION['caronaAmiga'],
		$_SESSION['Usuario_TIPO'] 
  	);
	header("Location: index.php"); // retorna pagina de login
?>
