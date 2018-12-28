<?php require_once("../../conexao/conexao.php"); 

    $querySQL = "SELECT * FROM produtos";
    $consulta = mysqli_query($conexao, $querySQL);
    if(query)
?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <?php include_once("_incluir/topo.php"); ?>
        </header>
        
        <main>  
            
        </main>

        <footer>
            <?php include_once("_incluir/rodape.php"); ?>
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conexao);
?>