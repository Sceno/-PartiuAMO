<?php
    
    header('Acess-Control-Alow-Origin:*');

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conexao){
        die("Falha ao conectar o banco de dados!");
    } 

    $comandoSQL = "SELECT * FROM produtos";
    $query = mysqli_query($conexao, $comandoSQL);
    
    $arquivo = array();
    while($consultaProdutos = mysqli_fetch_assoc($query)){
        $arquivo[] = $consultaProdutos;
    }
    echo json_encode($arquivo);
        
?>