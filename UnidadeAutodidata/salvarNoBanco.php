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
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $cep = $_POST["cep"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
    
        $comandoSQL = "INSERT INTO pessoas (nome, cpf, rg, cep, endereco, telefone) ";
        $comandoSQL .= "VALUES ('{$nome}', '{$cpf}', '{$rg}', '{$cep}', '{$endereco}', '{$telefone}')";
        
        $query = mysqli_query($conexao, $comandoSQL);
        
        if(!$query){
            echo("Falha ao inserir no banco");
        }else{
            echo("Inserção feita com sucesso!");
        }
    }
      
?>