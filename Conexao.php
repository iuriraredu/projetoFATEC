<?php
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $dbnome = "sic";

  // Criar a Conexão

  $conn = mysqli_connect($servidor, $usuario, $senha, $dbnome);

  if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
  }
  else{
    //echo "Conexao realizada com sucesso";
  }

  ?>
