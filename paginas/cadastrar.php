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

$query = $conexao->prepare("INSERT INTO portifolios(nome, email, descricao, linkedin, github, fotoPerfil, dataNascimento) VALUES(?, ?, ?, ?, ?, ?, ?)");

$query->bindValue(1, $_POST["nome"]);

$query->bindValue(2, $_POST["email"]);

$query->bindValue(3, $_POST["descricao"]);

$query->bindValue(4, $_POST["linkedin"]);

$query->bindValue(5, $_POST["github"]);

$query->bindValue(6, $caminho);

$query->bindValue(7, $_POST['dataNascimento']);

$query->execute();

http_response_code(200);
header('Location: /index.php');
exit("Cadastrado com sucesso");

?>