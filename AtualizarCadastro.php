<?php
  session_start();

  include_once("Conexao.php");

  /* --------------------------------------------
    $inputNomeCompleto = filter_input(INPUT_POST, 'inputNomeCompleto', FILTER_SANITIZE_STRING);
    $inputEmail = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
    $inputSenha = filter_input(INPUT_POST, 'inputSenha', FILTER_SANITIZE_STRING);
    $inputCaronaAmiga = (filter_input(INPUT_POST, 'inputCaronaAmiga', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0 ;
    $inputTipoUsuario = filter_input(INPUT_POST, 'inputTipoUsuario', FILTER_SANITIZE_NUMBER_INT);
    $codMatricula = 0;
    $t = intval($_SESSION['idUsuario']);


    
    echo "Nome Completo: $inputNomeCompleto <br/>";
    echo "E-mail: $inputEmail <br/>";
    echo "Senha: $inputSenha <br/>";
    echo "Carona Amiga: $inputCaronaAmiga <br/>";
    echo "Tipo de Usuário: $inputTipoUsuario <br/>";
    echo "Código de Matricula: $codMatricula <br/>";
    echo "Código de Usuário: $t <br/>";

    if ('$inputSenha' == ""){
      $sqlquery = "UPDATE usuario
                   SET nomeUsuario = '$inputNomeCompleto',
                       eMail = '$inputEmail',
                       caronaAmiga = $inputCaronaAmiga,
                       Usuario_TIPO = $inputTipoUsuario
                   WHERE idUsuario = $t";

    } else {
      $sqlquery = "UPDATE usuario
                   SET nomeUsuario = '$inputNomeCompleto',
                       eMail = '$inputEmail',
                       senha = '$inputSenha',
                       caronaAmiga = $inputCaronaAmiga,
                       Usuario_TIPO = $inputTipoUsuario
                   WHERE idUsuario = $t";
    }
    -------------------------------------------- */

  if($_POST) {
		$auxiliar = "";
        $inputSenha          = $_POST['inputSenha'];
        $inputConfirmaSenha  = $_POST['inputConfirmaSenha'];
		$inputNomeCompleto = $_POST['inputNomeCompleto'];
		$inputEmail = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
		$inputCaronaAmiga = (filter_input(INPUT_POST, 'inputCaronaAmiga', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0 ;
		$inputTipoUsuario = filter_input(INPUT_POST, 'inputTipoUsuario', FILTER_SANITIZE_NUMBER_INT);
		$codMatricula = 0;
		$t = intval($_SESSION['idUsuario']);
        if ($inputSenha == $auxiliar) {
			$sqlquery = "UPDATE usuario
						SET nomeUsuario = '$inputNomeCompleto',
							eMail = '$inputEmail',
							caronaAmiga = $inputCaronaAmiga,
							Usuario_TIPO = $inputTipoUsuario
						WHERE idUsuario = $t";

            // $_SESSION['msgAtlCad'] = "<b>| AVISO:</b> Senha não foi alterada!</span>";
        } else if ($inputSenha == $inputConfirmaSenha) {
			$sqlquery = "UPDATE usuario
						SET nomeUsuario = '$inputNomeCompleto',
							eMail = '$inputEmail',
							senha = '$inputSenha',
							caronaAmiga = $inputCaronaAmiga,
							Usuario_TIPO = $inputTipoUsuario
						WHERE idUsuario = $t";
			
            //$_SESSION['msgAtlCad'] = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: ".$senha."</span>";
        } else {
            $_SESSION['msgAtlCad'] = "<b>|</b> Não foi possivel salvar alteração, verifique a senha :(";
        }
    }

    $resultado = mysqli_query($conn, $sqlquery);

    if (mysqli_affected_rows($conn) > 0){
      $_SESSION['msgAtlCad'] = "<b>|</b> Salvo Com Sucesso! :)";
      $_SESSION['nomeUsuario'] = $inputNomeCompleto;
      $_SESSION['eMail'] = $inputEmail;
      $_SESSION['caronaAmiga'] = $inputCaronaAmiga;
      $_SESSION['Usuario_TIPO'] = $inputTipoUsuario;
      header("Location: Cadastro.php");
    	// echo "Cadastrado com Sucesso!";
    }
    else{
	    $_SESSION['msgAtlCad'] = ($_SESSION['msgAtlCad'] == "") ? "<b>|</b> Não foi possivel salvar alteração :(" : $_SESSION['msgAtlCad'];
      header("Location: Cadastro.php");
      // echo "Não cadastro!";
    }
  ?>
