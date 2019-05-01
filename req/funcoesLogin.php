<?php
   
   //definindo o nome do arquivo
   $nomeArquivo = "usuarios.json";
    
    function cadastrarUsuario($usuario){
        //pegando a variavel pra dentro da funcao
        global $nomeArquivo;
        //pgando o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);
        //transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        //adicionandoum novo usuario para o array associativo
        array_push($arrayUsuarios["usuarios"], $usuario);
        //transforma o array em json denovo
        $usuariosJson = json_encode($arrayUsuarios);
        //colocando o json devolta o arquivo usuarios.json
        $cadastrou = file_put_contents ($nomeArquivo, $usuariosJson);
        //retornando true ou false
        return $cadastrou;
    }

    function logarUsuario($email, $senha){
        global $nomeArquivo;
        $nomeLogado = "";

        //pegando o conteudo do aruqivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);
        //transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        //verificando se o usuario existe no arquivo usuarios.json
        foreach($arrayUsuarios["usuarios"]as $chave => $valor){
            //verificando se o email digitado eh igual ao email do json
            if ($valor["email"] == $email && password_verify($senha, $valor["senha"])) {
                $nomeLogado = $valor["nome"];
                break;
            }
        }
        return $nomeLogado;
    }

?>