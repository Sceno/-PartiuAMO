<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    
    if(!$conexao){
        die("Falha ao conectar ao banco de dados!");
    }

    $comandoSQL = "SELECT nomeproduto, precounitario FROM produtos";
    $query = mysqli_query($conexao, $comandoSQL);
    
    if (!$query){
        die("Falha ao consultar banco de dados.");
    }

    while ($consultaProdutos = mysqli_fetch_assoc($query)){
            
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <script src="jquery.js"></script>
    </head>
    <body>
        <div>
            <ui>
                <li></li>
            </ui>
        </div>
        
        
    </body>
    <script>
        function carregarDadosJSON(){
            $.getJSON("produtos.json", function(data){
                $.each(i, valor){
                    elementoHTML = "<li>" + valor.nomeproduto + " - " + valor.precounitario + " " + </li>";
                }
            })
        }
    </script>
    
</html>