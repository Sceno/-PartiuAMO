<?php require_once("../../conexao/conexao.php"); ?>
<?php 

    $comandoSQL = "SELECT * FROM estados";
    $query = mysqli_query($conexao, $comandoSQL);

    if (isset($_POST["nometransportadora"])) {
        $nomeTransportadora = $_POST["nometransportadora"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $cnpj = $_POST["cnpj"];
        
        $comandoSQL = "INSERT INTO transportadoras ";
        $comandoSQL .= "(nometransportadora, endereco, telefone, cidade, estadoID, cep, cnpj) ";
        $comandoSQL .= "VALUES ('{$nomeTransportadora}', '{$endereco}', '{$telefone}', '{$cidade}', '{$estado}', '{$cep}','{$cnpj}')";
        
        $insercao = mysqli_query($conexao, $comandoSQL);
        
        if(!$insercao){
            die("Falha na inserção no banco de dados.");
        }else{
            echo "Inserção feita com sucesso!";
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
        <link href="_css/crud.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main> 
            <div id="janela_formulario">
                <form action="inserir_transportadoras.php" method="post">
                    <input type="text" name="nometransportadora" placeholder="Nome da Transportadora">
                    <input type="text" name="endereco" placeholder="Endereco">
                    <input type="text" name="telefone" placeholder="Telefone">
                    <input type="text" name="cidade" placeholder="Municipio">
                    <select name="estado">
                        <?php 
                            while($consultEstado = mysqli_fetch_assoc($query)){
                        ?>
                                <option value="<?php echo $consultEstado["estadoID"] ?>"><?php echo utf8_encode($consultEstado["nome"]) ?></option>
                        <?php 
                            } 
                        ?>
                    </select>
                    <input type="text" name="cep" placeholder="CEP">
                    <input type="text" name="cnpj" placeholder="CNPJ">
                    <input type="submit" name="btnInsterir" value="Inserir">
        
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