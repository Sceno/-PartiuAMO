<?php 

    session_start();

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(!$conexao){
        echo("Falha ao conectar ao banco!");
    }


    if ((isset($_POST["usuario"]))) {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $comandoSQL = "SELECT * FROM clientes ";
        $comandoSQL .= "WHERE usuario = '{$usuario}' ";
        $comandoSQL .= "AND senha = '{$senha}' ";
        
        $query = mysqli_query($conexao, $comandoSQL);
        
        if (!$query){
            die("Falha na consulta ao banco");
        } 
        
        $resultConsulta = mysqli_fetch_assoc($query);
        
        if (empty($resultConsulta)){
            $mensagem = "Usuario e/ou senha incorretos";
            
        }else{
            $_SESSION['user_portal'] = $resultConsulta["clienteID"];
            header("Location: listagem.php");
        }
    }
?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/login.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div id="header_central">
                <img src="assets/logo_andes.gif">
                <img src="assets/text_bnwcoffee.gif">
            </div>
        </header>
        
        <main>  
            <div id="janela_login">
                <form action="login.php" method="post">
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuario">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">
                    <?php 
                        if (isset($mensagem)){
                    ?>
                        <p><?php echo $mensagem ?></p>
                    <?php
                        }
                    ?>
                </form>
            </div>
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