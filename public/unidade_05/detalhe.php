<?php //require_once("../../conexao/conexao.php"); ?>
<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    if(!$conexao){
        echo("Conexão com o banco de dados falhou!");
        echo "<br> Codigo de erro: " . mysqli_connect_errno(); 
    }
?>
<?php 
    setlocale(LC_ALL, 'pt_br');
    $query = mysqli_query($conexao, "SELECT * FROM PRODUTOS");
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
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="listagem_produtos">
                <?php while( $resultConsulta = mysqli_fetch_assoc($query) ){ ?>
                    <ul>
                        <li class="imagem"><img src="<?php echo $resultConsulta["imagempequena"]?>"></li>
                        <li><h3><?php echo $resultConsulta["nomeproduto"]?></h3></li>
                        <li>Tempo de entrega: <?php echo $resultConsulta["tempoentrega"]?> dias</li>
                        <li> Preço: R$<?php echo number_format($resultConsulta["precounitario"], 2 , ',' , '.') ?></li>
                    </ul>
                <?php } ?>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>