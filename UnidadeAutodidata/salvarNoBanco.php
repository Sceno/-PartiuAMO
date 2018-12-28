<?php 
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "pessoas";
    mysqli_connect($servidor, $usuario, $senha, $banco);

    if (isset($_GET["nome"]){
        $nome = $_GET["nome"];
        $cpf = $_GET["cpf"];
        $rg = $_GET["rg"];
        $cep = $_GET["cep"];
        $endereco = $_GET["endereco"];
        $telefone = $_GET["telefone"];
    }
    
    
?>