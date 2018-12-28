<?php 
    if (isset($_SESSION["user_portal"])){
        $usuarioSessaoID = $_SESSION["user_portal"];
        
        $servidor = "localhost";
        $senha = "";
        $usuario = "root";
        $banco = "andes";
        
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
        
        if (!$conexao){
            die("Falha ao conectar ao banco de dados.");
        }
        
        $comandoSQL = "SELECT nomecompleto FROM clientes ";
        $comandoSQL .= "WHERE nomecompleto = '{$usuarioSessaoID}' ";
        
        $query = mysqli_query($conexao, $comandoSQL);
        
        if(!$query){
            die("Falha na consulta ao banco de dados");
        }
        
        $resultConsulta = mysqli_fetch_assoc($query);
    }
    
    
?>
<header>
    <div id="header_central">
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif"> 
    </div>
</header>