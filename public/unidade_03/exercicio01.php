<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(!$conexao){
        die("Conexão com o banco de dados falhou!");
    }else{
        $comandoSQL = "SELECT * FROM categorias";
        $query = mysqli_query($conexao, $comandoSQL);
        if(!$query){
            echo "<br> Falha na consulta ao banco.";
        }else{
?>  
<!DOCTYPE HTML>
<html>
<head>
    <meta lang="pt-br" charset="utf-8">
    <title>TREINANDO PHP COM BANCO DE DADOS</title>
</head>
<body>
    <?php   
        while($resultConsulta = mysqli_fetch_assoc($query)){   
    ?>
            <li> <?php echo $resultConsulta["nomecategoria"]; ?></li>
    <?php
        }
    }
    ?>        
</body>
</html>