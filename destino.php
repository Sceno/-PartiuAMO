<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>
    <body> 
        <pre>
            <?php 
                
                isset($_GET["nome"]) ? $nome = $_GET["nome"] : $nome = "Sem definição";

                isset($_GET["email"]) ? $email = $_GET["email"] : $email = "Sem definição";
                
                isset($_GET["senha"]) ? $senha = $_GET["senha"] : $senha = "Sem definição";
                

                $dadosFormulario = array($nome, $email, $senha);
                print_r($dadosFormulario);

                print("</br>" . $dadosFormulario[0] . "</br>");
                print($dadosFormulario[1] . "</br>");
                print($dadosFormulario[2] . "</br>");
            ?>
        </pre>
    </body>
</html>