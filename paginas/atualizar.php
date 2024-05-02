<?php

use Projeto\Database\Conexao;

require_once("../vendor/autoload.php");

if($_SERVER["REQUEST_METHOD"] != "POST"){
    http_response_code(405);
    exit("metodo nao permitido");
}

if(!isset($_POST) || !isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["descricao"]) || !isset($_POST["github"]) || !isset($_POST["linkedin"])){
    http_response_code(400);
    exit("Dados invalidos");
}

if(!isset($_GET["id"])){
    http_response_code(400);
    exit("Dados invalidos");
}

require_once("../../vendor/autoload.php");

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("UPDATE portifolios SET nome = ?, email = ?, linkedin = ?, github = ?, descricao = ? WHERE id = ?");

$query->bindValue(1, $_POST["nome"]);

$query->bindValue(2, $_POST["email"]);

$query->bindValue(3, $_POST["linkedin"]);

$query->bindValue(4, $_POST["github"]);

$query->bindValue(5, $_POST["descricao"]);

$query->bindValue(6, $_GET["id"]);

$query->execute();

http_response_code(200);
header('Location: /index.php');
exit("Atualizado com sucesso");

?>