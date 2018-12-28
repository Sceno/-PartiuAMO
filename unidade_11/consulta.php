<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <main>
            <div id="janela_formulario">
                <form id="pesquisarProdutos">
                    <label for="categorias">Categorias</label>
                    <select id="categorias"></select>
                    <select id="produtos"></select>
                </form>
            </div>
        </main>
        <script>
            function retornarCategorias(dados){
                var categoriasHTML;
                $.each(dados, function(indice, valor){
                    categoriasHTML += '<option value=" ' + valor.categoriaID + ' "> ' + valor.nomecategoria + ' </option>';
                });
                $('#categorias').html(categoriasHTML);
                
                $('#categorias').change(function(e){
                    var categoriaID = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: 'retornar_produtos.php',
                        data: 'categoriaID=' + categoriaID,
                        async: false
                    }).done(function(dados){
                        var produtosHTML;   
                        $.each($.parseJSON(dados), function(indice, valor){
                            produtosHTML += '<option value="' + valor.produtoID + '">' + valor.nomeproduto + '</option>';    
                        });
                        $('#produtos').html(produtosHTML);
                    });
                });
                /*
                    $.each(dados, function(indice, valor))
                   produtosHTML += '<option value="' + valor.
                });*/
            }
        </script>
        <script src="_js/jquery.js"></script>
        <script src="http://localhost/php_integracao/-PartiuAMO/unidade_11/retornar_categorias.php?callback=retornarCategorias"></script>
    </body>
</html>