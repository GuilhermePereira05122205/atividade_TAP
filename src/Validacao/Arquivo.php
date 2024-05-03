<?php

namespace Projeto\Validacao;

class Arquivo{

    private $url = "http://localhost:8000";

    public function validarArquivo($arquivo){
        $extensao = strtolower(pathinfo( $arquivo["name"], PATHINFO_EXTENSION ));

        if( $extensao != "png" && $extensao != "jpg" && $extensao != "jpeg" && $extensao != "gif"){
            http_response_code(400);
            exit("Extensao invalida");
        }

        $tamanho = $_FILES["fotoPerfil"]["size"] / 1024 / 1024;

        if($tamanho >= 2){
            http_response_code(400);
            exit("Foto muito grande");
        }

        $fotoPerfil = $_FILES["fotoPerfil"]["tmp_name"];

        $caminho = "./img/fotosPerfil/".uniqid()."_".time().".".$extensao;

        return $caminho;
    }
}




?>