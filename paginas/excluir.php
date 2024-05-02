<?php

use Projeto\Database\Conexao;

require_once("../vendor/autoload.php");

if($_SERVER["REQUEST_METHOD"] != "GET"){
    http_response_code(405);
    exit("metodo nao permitido");
}

if(!isset($_GET["id"])){
    http_response_code(400);
    exit("Dados invalidos");
}

require_once("../../vendor/autoload.php");

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("DELETE FROM portifolios WHERE id = ?");

$query->bindValue(1, $_GET["id"]);

$query->execute();

http_response_code(200);
header('Location: /index.php');
exit("Atualizado com sucesso");

?>