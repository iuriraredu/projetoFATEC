<?php
	session_start(); // inicia php

  unset( // destroi as variaveis
    $_SESSION['idUsuario'],
    $_SESSION['nomeUsuario'],
    $_SESSION['eMail'],
  );

  header("Location: index.php"); // retorna pagina de login
?>
