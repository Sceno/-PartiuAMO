<?php 
    require_once("../../conexao/conexao.php");
    
    if (isset($_GET["codigo"])){
        $transportadoraID = $_GET["codigo"]; 
        
        //CONSULTANDO TRANSPORTADORAS
        $comandoSQL = "SELECT * FROM transportadoras ";
        $comandoSQL .= " WHERE transportadoraID = {$transportadoraID}";
        $query = mysqli_query($conexao, $comandoSQL);
        if (!$query){
            echo("Falha ao acessar banco! - 1");
        }
        $consultaT = mysqli_fetch_assoc($query);
        if (!$consultaT){
            die("Falha na consulta ao banco de dados");
        }
        
         //CONSULTANDO NOME DOS ESTADOS PARA O COMBO DE ESTADOS
        $comandoSQL = "SELECT nome FROM estados";
        $comandoSQL .= " WHERE estadoID = {$consultaT["estadoID"]}";
        $query = mysqli_query($conexao, $comandoSQL);
        if (!$query){
            die("Falha ao acessar banco! - 2");
        }
        $consultaE = mysqli_fetch_assoc($query);
        if (!$consultaE){
            die("Falha na consulta ao banco de dados");
        }

        //CONSULTANDO ID DOS ESTADOS PARA SER OS VALORES DO COMBO DE ESTADOS
        $comandoSQL = "SELECT * FROM estados";
        $query = mysqli_query($conexao, $comandoSQL);
        if (!$query){
            die("Falha ao acessar banco!");
        }
        $consultaE2 = mysqli_fetch_assoc($query);
        if (!$consultaE2){
            die("Falha na consulta ao banco de dados");
        }
    }
    else{
        header("location: listagem.php");
    }


    if (isset($_POST["nome"])){
        $transportadoraID = $_POST["transportadoraID"];
        $nome = utf8_decode($_POST["nome"]);
        $endereco = utf8_decode($_POST["endereco"]);
        $telefone = utf8_decode($_POST["telefone"]);
        $cidade = utf8_decode($_POST["cidade"]);
        $estadoID = utf8_decode($_POST["estadoID"]);
        $cep = utf8_decode($_POST["cep"]);
        $cnpj = utf8_decode($_POST["cnpj"]);
        
        $comandoSQL = "DELETE FROM transportadoras ";
        $comandoSQL .= "WHERE transportadoraID = {$transportadoraID} ";
        
        
        $query = mysqli_query($conexao, $comandoSQL);
        if (!$query){
            echo("Falha ao alterar no banco de dados.");
            echo mysqli_connect_errno();
        }else{
            header("location: listagem.php");
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="janela_formulario">
                <form action="exclusao.php" method="post">
                    <input type="hidden" name="transportadoraID" value="<?php echo utf8_encode($consultaT["transportadoraID"]); ?>" >
                    <label>Nome da Transportadora</label>
                    <input type="text" name="nome" value="<?php echo utf8_encode($consultaT["nometransportadora"]); ?> " disabled >
                    <label>Endereço</label>
                    <input type="text" name="endereco" value="<?php echo utf8_encode($consultaT["endereco"]); ?>" disabled >
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?php echo utf8_encode($consultaT["telefone"]); ?>" disabled >
                    <label>Cidade</label>
                    <input type="text" name="cidade" value="<?php echo utf8_encode($consultaT["cidade"]); ?>" disabled >
                    <label>Estado</label>
                    <select name="estadoID" value="<?php echo utf8_encode($consultaE["nome"]); ?>" disabled >
                        <?php 
                            while($consultaE2 = mysqli_fetch_assoc($query)){
                                $estadoDaTransportadora = $consultaT["estadoID"];
                                if ($estadoDaTransportadora == $consultaE2["estadoID"]){
                        ?>
                                    <option value="<?php echo $consultaE2["estadoID"] ?>" selected>
                                        <?php echo utf8_encode($consultaE2["nome"]) ?>
                                    </option>
                        <?php   } else { ?>  
                        
                                    <option value="<?php echo $consultaE2["estadoID"] ?>">
                                        <?php echo utf8_encode($consultaE2["nome"]) ?>
                                    </option>
                        <?php   } ?>    
                        <?php 
                            } 
                        ?>
                    </select>
                    <label>CEP</label>
                    <input type="text" name="cep" value="<?php echo utf8_encode($consultaT["cep"]); ?>" disabled >
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" value="<?php echo utf8_encode($consultaT["cnpj"]); ?>" disabled >
                    <input type="submit" name="btn_confirmar" value="Confirmar Exclusão">
                </form>
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conexao);
?>