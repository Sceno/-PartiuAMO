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
    if (isset($_GET["codigo"])) {
        $codigoProduto = $_GET["codigo"]; 
    }else{
        header("Location: inicial.php");
    }
    
    $comandoSQL = "SELECT * FROM ";
    $comandoSQL .= "produtos ";
    $comandoSQL .= "WHERE ";
    $comandoSQL .= "produtoID = {$codigoProduto}";
        
    $query = mysqli_query($conexao, $comandoSQL);

    if(!$query)
        echo "Falha na consulta ao banco de dados.";
    else{
        $resultConsulta = mysqli_fetch_assoc($query);
        
        $descricao = $resultConsulta["descricao"];
        $precoRevenda = $resultConsulta["precorevenda"];
        $codigoBarra = $resultConsulta["codigobarra"];
        $tempoEntrega = $resultConsulta["tempoentrega"];
        $precoUnitario = $resultConsulta["precounitario"];
        $estoque = $resultConsulta["estoque"];
        $imagemGrande = $resultConsulta["imagemgrande"];
    }
    ?>
        
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div class="produto_pesquisa">
                
            </div>
            <div id="detalhe_produto">
                <ul>
                    <?php  ?>

                    <li class="imagem"><img src="<?php echo $imagemGrande ?>"></li>
                    <li><h2><?php echo $nomeProduto ?></h2></li>
                    <li><b>Descrição: </b><?php echo $descricao ?></li>
                    <li><b>Código de Barra: </b><?php echo $codigoBarra ?></li>
                    <li><b>Tempo de Entrega: </b><?php echo $tempoEntrega ?></li>
                    <li><b>Preço de Revenda: </b><?php echo number_format($precoRevenda, 2 , "," , ".") ?></li>
                    <li><b>Preço Unitário: </b><?php echo number_format($precoUnitario, 2 , "," , ".") ?></li>
                    <li><b>Estoque: </b><?php echo number_format($estoque, 2 , "," , ".") ?></li>
                </ul>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conexao);
?>