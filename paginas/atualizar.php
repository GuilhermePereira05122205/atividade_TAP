<?php

use Projeto\Database\Conexao;
use Projeto\Validacao\Arquivo;

require_once("../vendor/autoload.php");


if($_SERVER["REQUEST_METHOD"] != "POST"){
    http_response_code(405);
    exit("metodo nao permitido");
}

if(!isset($_POST) || !isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["descricao"]) || !isset($_POST["github"]) || !isset($_POST["linkedin"]) || !isset($_FILES["fotoPerfil"]) || !isset($_POST["dataNascimento"])){
    http_response_code(400);
    exit("Dados invalidos2");
}

if(!isset($_GET["id"])){
    http_response_code(400);
    exit("Dados invalidos");
}

$validacao = new Arquivo();
$caminho = $validacao->validarArquivo($_FILES["fotoPerfil"]);

if(!move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $caminho)){
    http_response_code(500);
    exit("Erro ao salvar foto");
}

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("CALL AtualizarPortfolio(:nome, :email, :dataNascimento, :github, :linkedin, :descricao, :fotoPerfil, :id)");

$query->bindValue("nome", $_POST["nome"]);

$query->bindValue("email", $_POST["email"]);

$query->bindValue("dataNascimento", $_POST["dataNascimento"]);

$query->bindValue("github", $_POST["github"]);

$query->bindValue("linkedin", $_POST["linkedin"]);

$query->bindValue("descricao", $_POST["descricao"]);

$query->bindValue("fotoPerfil", $caminho);

$query->bindValue("id", $_GET["id"]);

$query->execute();

http_response_code(200);
header('Location: /listar.php');
exit("Atualizado com sucesso");

?>