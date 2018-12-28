<?php
    // Criar objeto de conexao
    $conecta = mysqli_connect("localhost","root","","andes");
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    // tabela de transportadoras
    $tr = "SELECT * FROM transportadoras ";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP INTEGRACAO</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>        
        <main>  
            <div id="janela_transportadoras">
                <?php
                    while($linha = mysqli_fetch_assoc($consulta_tr)) {
                ?>
                <ul>
                    <li><?php echo utf8_encode($linha["nometransportadora"]) ?></li>
                    <li><?php echo utf8_encode($linha["cidade"]) ?></li>
                    <li><a href="" class="excluir" title="<?php echo $linha["transportadoraID"] ?>">Excluir</a></li>
                </ul>
                <?php
                    }
                ?>
            </div>
        </main>

        
        <script src="jquery.js"></script>
        <script>
            $('div#janela_transportadoras  ul li a').click(function(e){
                e.preventDefault(); //evita que seja executada a ação padrão deste elemento
                var elemento = $(this);
                
                var id = $(elemento).attr('title');
                console.log("O id é " + id);
            
                $.ajax({
                    type: "POST",
                    url: "exclusao.php",
                    data: "transportadoraID=" + id,
                    async: false
                }).done(function(retorno){
                    if (jQuery.parseJSON(retorno)["sucesso"]){
                        $(elemento).parent().parent().fadeOut();
                        alert(jQuery.parseJSON(retorno)["mensagem"]);
                    }
                }).fail(function(){
                    
                })
            });
            
        </script>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>