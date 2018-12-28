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
        $('div#curso').load('dados.txt');
    </script>
</html>