<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(mysqli_connect_errno()){
        die("Conexão com o banco de dados falhou!" . mysqli_connect_errno());
    }
?>