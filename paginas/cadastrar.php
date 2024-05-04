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

$query = $conexao->prepare("CALL CadastrarPortfolio(:nome, :email, :dataNascimento, :github, :linkedin, :descricao, :fotoPerfil)");

$query->bindValue("nome", $_POST["nome"]);

$query->bindValue("email", $_POST["email"]);

$query->bindValue("dataNascimento", $_POST["dataNascimento"]);

$query->bindValue("github", $_POST["github"]);

$query->bindValue("linkedin", $_POST["linkedin"]);

$query->bindValue("descricao",  $_POST["descricao"]);

$query->bindValue("fotoPerfil", $caminho);

$query->execute();

http_response_code(200);
header('Location: /listar.php');
exit("Cadastrado com sucesso");

?>