<?php
    include "inc/head.php";
    include "inc/header.php";

    //verificando se o aruqivo foi enviado
    if ($_FILES){
        //verificando se nao teve erro de upload
        if ($_FILES ["arquivo"]["error"] == UPLOAD_ERR_OK){
            //pegando o noem real do aquivo
         $nomeArquivo = $_FILES ["arquivo"]["name"];
            //pegando nome temporarvio do arquivo
            $nomeTemp = $_FILES ["arquivo"] ["tmp_name"];
            //pegando o caminho ate a pasta raiz
            $pastaRaiz = dirname(__FILE__);
            //selecioando a pasta para qual o aruqivo sera enviado
            $pastaDesejada = "\assets\img\\";
            //selecionando o caminho completo para ser utilizado na funcao move_uploaded_file
            $caminhoCompleto = $pastaRaiz . $pastaDesejada . "avatar.jpg";
            // movendo o arquivo com a funcao mov_uploaded_file
            move_uploaded_file($nomeTemp, $caminhoCompleto);
        }
    }

?>

    <div class="page-center">
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="assets/img/avatar.jpg" alt="Foto de perfil">
                <div class="caption">
                    <h2><?php echo $nomeLogado ?></h2>
                    <p><?php echo $emailLogado ?></p>
                    <form action="usuario.php" method="post" enctype="multipart/form-data">
                        <label for="inputArquivo" class="btn btn-info">Escolha sua foto</label>
                        <input type="file" name="arquivo" class="hidden" id="inputArquivo">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    
                    </form>
                </div>
             </div>
        </div>
    </div>
<?php
    include "inc/footer.php";
?>