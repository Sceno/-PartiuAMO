<?php require_once("../../conexao/conexao.php"); ?>
<?php 
    session_start();
    
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
            <div id="header_central">
                <img src="assets/logo_andes.gif">
                <img src="assets/text_bnwcoffee.gif">
            </div>
        </header>
        
        <main>
            <?php 
                unset($_SESSION["usuario"]);
                if (isset($_SESSION["usuario"])){
                    echo $_SESSION["usuario"];        
                }else{
                    echo "Usuario fez logout!";
                }
            ?>
            <a href="pagina1.php">Página 1</a>
            <a href="pagina2.php">Página 2</a>
        </main>

        <footer>
            <div id="footer_central">
                <p>ANDES &eacute; uma empresa fict&iacute;cia, usada para o curso PHP Integra&ccedil;&atilde;o com MySQL.</p>
            </div>
        </footer>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conexao);
?>