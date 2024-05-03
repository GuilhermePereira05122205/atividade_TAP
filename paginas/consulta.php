<?php


use Projeto\Database\Conexao;

require_once("../vendor/autoload.php");

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    http_response_code(405);
    exit("metodo nao permitido");
}

if (!isset($_GET["id"])) {
    http_response_code(400);
    exit("Dados invalidos");
}

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("CALL Portfolio(:id)");

$query->bindValue("id", $_GET["id"]);

$query->execute();

$portifolio = $query->fetchObject();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/stylecss.css">
    <script src="./js/editarCampos.js" type="module"></script>

    <title>Atualizar</title>
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <ul>
                <a href="/">
                    <li>Home</li>
                </a>
                <a href="/cadastrarView.php">
                    <li>Criar portifolio</li>
                </a>
                <a href="/listar.php">
                    <li>Listar</li>
                </a>
                </ul>
            </ul>
        </nav>

    </header>
    <section style="margin-top: 30px; margin-bottom: 30px;" class="formulario">
        <div class="borda">
            <div class="table">
                <div style="text-align: center; font-size: 7vh; font-weight: bold;">Suas informações</div><br>
                <form action="/atualizar.php?id=<?php echo $portifolio->id ?>" method="POST" class="form" enctype="multipart/form-data">

                    <div>Nome <br>
                        <input type="text" name="nome" class="input" value="<?php echo $portifolio->nome ?>" disabled>
                    </div>
                    <button class="botao editar" type="button" id="nome">Editar</button> <button type="button" id="nome" class="botao excluir">Excluir</button>

                    <div>
                        E-mail <br>
                        <input type="text" name="email" class="input" value="<?php echo $portifolio->email ?>" disabled>
                    </div>
                    <button class="botao editar" id="email" type="button">Editar</button> <button class="botao excluir" id="email" type="button">Excluir</button>


                    <div>Data de nascimento <br>
                        <input type="text" name="dataNascimento" class="input" value="<?php echo $portifolio->dataNascimento ?>" disabled>
                    </div>
                    <button class="botao editar" id="dataNascimento" type="button">Editar</button> <button class="botao excluir" id="dataNascimento" type="button">Excluir</button>

                    <div>
                        GitHub <br>
                        <input type="text" name="github" class="input" value="<?php echo $portifolio->github ?>" disabled>
                    </div>
                    <button class="botao editar" id="github" type="button">Editar</button> <button class="botao excluir" id="github" type="button">Excluir</button>

                    <div>
                        Linkedin <br>
                        <input type="text" name="linkedin" class="input" value="<?php echo $portifolio->linkedin ?>" disabled>
                    </div>
                    <button class="botao editar" id="linkedin" type="button">Editar</button> <button class="botao excluir" id="linkedin" type="button">Excluir</button>

                    <div class="imagem">
                        Foto <br>
                        <img src="" alt="" id="foto">
                        <input type="file" name="fotoPerfil" class="input" id="imagem">
                        <label for="imagem">Atualizar Imagem</label>
                    </div>
                    <div>
                        <h4>Sobre você e seus projeto</h4>
                        <textarea name="descricao" class="input" disabled><?php echo $portifolio->descricao ?></textarea>
                    </div>

                    <button class="botao editar" id="descricao" type="button">Editar</button> <button class="botao excluir" type="button" id="descricao">Excluir</button>

            </div>

            <div style="text-align: center; margin-top: 20px;"><button type="submit" class="botao" style="margin: 0;">Salvar</button></div>
            <br><br>

            </form>
        </div>
        </div>

    </section>
    <footer>
        <h4>Portfolios</h4>
        <h4>Desenvolvido para a criação de portifólios rápidos e simples.</h4>
    </footer>

    <script src="./js/Imagem.js"></script>
    <script>
        carregarImagem("<?php echo $portifolio->fotoPerfil  ?>")

    </script>
</body>

</html>