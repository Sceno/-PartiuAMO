<?php 

    require_once("../../conexao/conexao.php");

    $comandoSQL = "SELECT * FROM categorias";
    $query = mysqli_query($conexao, $comandoSQL);
    if(!$query){
        echo "<br> Falha na consulta ao banco.";
    }else{
        while($resultConsulta = mysqli_fetch_assoc($query)){
            print_r($resultConsulta);
            echo "<br>";
        }
    }
    mysqli_free_result($query);
    mysqli_close($conexao);
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta lang="pt-br" charset="utf-8">
    <title>TREINANDO PHP COM BANCO DE DADOS</title>
</head>
<body>
    
</body>
</html>