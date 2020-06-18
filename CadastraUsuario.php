<?php
  session_start();

  include_once("Conexao.php");

  $inputNomeCompleto = filter_input(INPUT_POST, 'inputNomeCompleto', FILTER_SANITIZE_STRING);
  $inputEmail = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
  $inputSenha = filter_input(INPUT_POST, 'inputSenha', FILTER_SANITIZE_STRING);
  $inputCaronaAmiga = (filter_input(INPUT_POST, 'inputCaronaAmiga', FILTER_SANITIZE_STRING)) == 'on' ? 1 : 0 ;
  $inputTipoUsuario = filter_input(INPUT_POST, 'inputTipoUsuario', FILTER_SANITIZE_NUMBER_INT);
  $codMatricula = 0;


    /* --------------------------------------------
    echo "Nome Completo: $inputNomeCompleto <br/>";
    echo "E-mail: $inputEmail <br/>";
    echo "Senha: $inputSenha <br/>";
    echo "Carona Amiga: $inputCaronaAmiga <br/>";
    echo "Tipo de Usuário: $inputTipoUsuario <br/>";
    echo "Código de Matricula: $codMatricula <br/>";
    -------------------------------------------- */

    $sqlquery = "INSERT INTO  usuario (nomeUsuario, dataNascimento, eMail, senha, caronaAmiga, codMatricula, Usuario_TIPO) VALUES ('$inputNomeCompleto', '0000-00-00', '$inputEmail', '$inputSenha', $inputCaronaAmiga, $codMatricula, $inputTipoUsuario)";

    $resultado = mysqli_query($conn, $sqlquery);

    if (mysqli_insert_id($conn)){
      $_SESSION['msg'] = "Salvo Com Sucesso!";
      header("Location: Cadastro.php");
    	// echo "Cadastrado com Sucesso!";
    }
    else{
      $_SESSION['msg'] = "Não Foi Salvo Com Sucesso :("; 
      header("Location: Cadastro.php");
      // echo "Não cadastro!";
    }

?>
