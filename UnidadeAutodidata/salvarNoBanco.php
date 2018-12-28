<?php 
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "amo";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conexao){
        die("Falha na conexão!");
    }

    if (isset($_POST["nome"])){
        $nome = utf8_decode($_POST["nome"]);
        $cpf = utf8_decode($_POST["cpf"]);
        $rg = utf8_decode($_POST["rg"]);
        $cep = utf8_decode($_POST["cep"]);
        $endereco = utf8_decode($_POST["endereco"]);
        $telefone = utf8_decode($_POST["telefone"]);
    
        $comandoSQL = "INSERT INTO pessoa (nome, cpf, rg, cep, endereco, telefone) ";
        $comandoSQL .= "VALUES ('{$nome}', '{$cpf}', '{$rg}', '{$cep}', '{$endereco}', '{$telefone}')";
        
        $query = mysqli_query($conexao, $comandoSQL);
        
        if(!$query){
            $retorno = "Falha ao inserir no banco";
        }else{
            $retorno = "Inserção feita com sucesso!";
        }
        
        echo $retorno;
    }
?>