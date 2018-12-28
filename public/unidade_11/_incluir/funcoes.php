<?php 
    
    function mostrarAvisoPublicacao(){
        $array_erro = array(
        UPLOAD_ERR_OK => "Sem erro.",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
        UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
        UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
        UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo." ); 
        
        return $array_erro['numero'];
    }

    function publicarArquivo($imagem){
        
        
        echo "<pre>";
        print_r($_FILES['arquivo']);
        echo "</pre>";
        
        
        $nomeArquivo = basename($imagem['name']);
        
        $arquivoTemporario = $imagem['tmp_name'];
        $diretorio = "upload";
        
            if (move_uploaded_file($arquivoTemporario, $diretorio . "/" . $nomeArquivo)){
                $mensagem = "<br>Arquivo enviado com sucesso!";
            }else{
                $mensagem = mostrarAvisoPublicacao($imagem['error']);
            }
            
        return $mensagem;
    }


?>
