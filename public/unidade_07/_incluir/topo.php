<header>
    <div id="header_central">
        <img src="assets/logo_andes.gif">
        <img src="assets/text_bnwcoffee.gif">
        <?php 
            if (isset($_SESSION["user_portal"])){
                $usuarioSessaoID = $_SESSION["user_portal"];

                $comandoSQL = "SELECT nomecompleto FROM clientes ";
                $comandoSQL .= "WHERE clienteID = '{$usuarioSessaoID}' ";

                $query = mysqli_query($conexao, $comandoSQL);

                if(!$query){
                    die("Falha na consulta ao banco de dados");
                }

                $resultConsulta = mysqli_fetch_assoc($query); 
        ?>
                <div id="header_saudacao"><h5>Bem vindo, <?php echo $resultConsulta["nomecompleto"]; ?> - <a href="sair.php">Sair</a></h5></div>
        <?php 
            }   
        ?>
    </div>
</header>