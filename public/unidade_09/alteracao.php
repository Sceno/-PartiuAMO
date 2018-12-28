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


    if (isset($_POST["nome"])){
        $transportadoraID = $_POST["transportadoraID"];
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $cidade = $_POST["cidade"];
        $estadoID = $_POST["estadoID"];
        $cep = $_POST["cep"];
        $cnpj = $_POST["cnpj"];
        
        $comandoSQL = "UPDATE transportadoras ";
        $comandoSQL .= "SET nometransportadora = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', cidade = '{$cidade}', estadoID = {$estadoID}, cep = '{$cep}', cnpj = '{$cnpj}') ";
        $comandoSQL .= "WHERE transportadoraID = {$transportadoraID} ";
        
        $query = mysqli_query($conexao, $comandoSQL);
        if (!$query){
            die("Falha ao alterar no banco de dados.");
            echo mysqli_connect_errno();
        }else{
            echo "Informação salva no banco de dados com sucesso!";
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
                <form action="alteracao.php" method="post">
                    <label>Nome da Transportadora</label>
                    <input type="hidden" name="transportadoraID" value="<?php echo utf8_encode($consultaT["transportadoraID"]); ?>">
                    <input type="text" name="nometransportadora" value="<?php echo utf8_encode($consultaT["nome"]); ?>">
                    <label>Endereço</label>
                    <input type="text" name="endereco" value="<?php echo utf8_encode($consultaT["endereco"]); ?>">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value="<?php echo utf8_encode($consultaT["telefone"]); ?>">
                    <label>Cidade</label>
                    <input type="text" name="cidade" value="<?php echo utf8_encode($consultaT["cidade"]); ?>">
                    <label>Estado</label>
                    <select name="estadoID" value="<?php echo utf8_encode($consultaE["nome"]); ?>">
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
                    <input type="text" name="cep" value="<?php echo utf8_encode($consultaT["cep"]); ?>">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" value="<?php echo utf8_encode($consultaT["cnpj"]); ?>">
                    <input type="submit" name="btn_confirmar" value="Confirmar Alterações">
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