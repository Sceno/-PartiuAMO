<?php 

    require_once("../../conexao/conexao.php"); 

    setlocale( LC_ALL, 'pt_BR');

    $querySQL = "SELECT * FROM produtos";
    $consulta = mysqli_query($conexao, $querySQL);
    if(!$consulta){
        die ("Falha na consulta ao banco!");
    }
?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <?php include_once("_incluir/topo.php"); ?>
        </header>
        
        <main>  
            
            <ul>
                <?php  
                    while($resultConsulta = mysqli_fetch_assoc($consulta)){  ?>
                        <li><img src="<?php echo $resultConsulta["imagempequena"]; ?>" >
                        <li><?php echo $resultConsulta["nomeproduto"]; ?> </li>
                        <li><?php echo $resultConsulta["tempoentrega"]; ?></li>
                        <li><?php echo $resultConsulta["precounitario"]; ?></li>
                        <br>
                <?php 
                    } 
                ?>
            </ul>
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