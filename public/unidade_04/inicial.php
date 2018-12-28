<?php 

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(!$conexao){
        echo "Falha na conexão ao banco de dados. Codigo de erro: " . mysqli_connect_errno() ;
    }
?>

<?php 
    setlocale(LC_ALL, "pt_BR");
    $query = mysqli_query($conexao, "SELECT * FROM produtos");
    if(!$query){
        echo "Falha na consulta ao banco.";
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produtos.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <?php include_once("_incluir/topo.php"); ?>
        </header>
        
        <main> 
            <div id="listagem_produtos">
                <?php while($resultConsulta = mysqli_fetch_assoc($query)){ ?>      
                    <ul>
                        <li class="imagem">
                            <a href="detalhe.php?codigo=<?php echo $resultConsulta["produtoID"] ?>">
                                <img src="<?php echo $resultConsulta["imagempequena"]?>">
                            </a>
                        </li>
                        <li><h3><?php echo $resultConsulta["nomeproduto"]?></h3></li>
                        <li>Tempo de Entrega: <?php echo $resultConsulta["tempoentrega"]?></li>
                        <li>Preço Unitário: R$<?php echo number_format($resultConsulta["precounitario"], 2 , ",", ".") ?></li>
                    </ul>
                <?php } ?>
            </div>
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