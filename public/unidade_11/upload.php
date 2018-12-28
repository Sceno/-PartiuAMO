<?php 
    require_once("_incluir/funcoes.php");
    

    if (isset($_POST["btnEnviar"])){
        
        $mensagem = publicarArquivo($_FILES['arquivo']);
        echo $mensagem;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta  charset="UTF-8" lang="pt-BR">
        <title Treinamento de Upload></title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <?php require_once("_incluir/topo.php"); ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="arquivo">
            <input type="submit" name="btnEnviar" value="Enviar">
        </form>
        <?php require_once("_incluir/rodape.php") ?>
    </body>
</html>