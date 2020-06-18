<?php
  session_start();
  include_once("Conexao.php");

  /* --------------------------------------------------------------------------
  $inputEmail = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
  $inputSenha = filter_input(INPUT_POST, 'inputSenha', FILTER_SANITIZE_STRING);
  -------------------------------------------------------------------------- */
  if ((isset($_POST['inputEmail'])) && (isset($_POST['inputSenha']))) {
    // Escapando de Caracteres Especiais, como aspas, prevenindo SQL injection
  	$usuario = mysqli_real_escape_string($conn, $_POST['inputEmail']);
  	$senha = mysqli_real_escape_string($conn, $_POST['inputSenha']);
  	// $senha = md5($senha);

  	$sqlquery = "SELECT * FROM usuario WHERE eMail = '$usuario' && senha = '$senha'  LIMIT 1";
  	$result = mysqli_query($conn, $sqlquery);
  	$resultado = mysqli_fetch_assoc($result);

    if (empty($resultado)){
      $_SESSION['msgSenha'] = "<p style='text-align: center;'>Usuário ou senha inválido :(</p>";
      header("Location: index.php");
    } elseif (isset($resultado)){
      $_SESSION['idUsuario'] = $resultado['idUsuario'];
      $_SESSION['nomeUsuario'] = $resultado['nomeUsuario'];
      $_SESSION['eMail'] = $resultado['eMail'];
      $_SESSION['caronaAmiga'] = $resultado['caronaAmiga'];
      $_SESSION['Usuario_TIPO'] = $resultado['Usuario_TIPO']; 
      header("Location: Home.php");
    } else {
      $_SESSION['msgSenha'] = "<p style='text-align: center;'>Usuário ou senha inválido :(</p>";
      header("Location: index.php");
    }
  } else {
    $_SESSION['msgSenha'] = "<p style='text-align: center;'>Usuário ou senha inválido :(</p>";
    header("Location: index.php");
  }

?>
