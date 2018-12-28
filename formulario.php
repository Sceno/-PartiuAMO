<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>PRATICANDO FORMULÁRIO com PHP</title>
</head>
<body>
    <form action="destino.php" method="get">
        
        <div class="container">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>                
            <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" type="password" name="senha">
            </div>
        </div>
        <div class="container">
            <div class="col-md-2">
                <label for="comentario" >Comentário</label>
                <textarea></textarea>
            </div>
            <div class="col-md-2">
                <input type="radio" name="newsletter" value="s"> Inscrever-se na newsletter
            </div>
            <div class="btn btn-primary btn-danger">
                <input type="submit" name="enviar" value="Enviar Cadastro">
            </div>
        </div>
        
    </form>
</body>
</html>