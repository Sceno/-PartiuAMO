<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <script src="jquery.js"></script>
    </head>
    <body>
        <div id="curso"></div>
        
    </body>
    <script>
        $.ajax({
            url:'nome.php'
        }).then(sucesso, falha);
        
        function sucesso(valor){
            $('div#nome').html(valor);
        }
        
        function falha(valor){
            $('div#nome').html("Falha no carregamento!");
        }
    </script>
</html>