<?php


use Projeto\Database\Conexao;

require_once("../vendor/autoload.php");

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("CALL ListarPortfolios()");

$query->execute();


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Index</title>
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
    <main>
        <section class="titulo">
            <h1>Portifolios</h1>
        </section>
        <section class="grid">
            <?php foreach ($query->fetchAll(PDO::FETCH_BOTH) as $portfolio) { ?>
                <aside class="portfolio">
                    <div class="nome">
                        <img src="<?php echo $portfolio["fotoPerfil"] ?>" alt="">
                        <div>
                            <p><?php echo $portfolio["nome"] ?></p>
                            <p><?php echo $portfolio["email"] ?></p>
                        </div>
                    </div>
                    <div class="descricao">
                        <h3>Saiba mais sobre mim e meus trabalhos</h3>
                        <p><?php echo $portfolio["descricao"] ?></p>
                    </div>
                    <div class="redes">
                        <div>
                            <a href="<?php echo $portfolio["github"] ?>"><img src="./img/github.png" alt=""></a>
                        </div>
                        <div>
                        <a href="/consulta.php?id=<?php echo $portfolio["id"] ?>"> <img src="./img/edit.png" alt=""> </a>
                        </div>
                        <div>
                            <a href="<?php echo $portfolio["linkedin"] ?>"><img src="./img/linkedin.png" alt=""></a>
                        </div>
                    </div>

                </aside>
                <?php } ?>
        </section>
    </main>
    <footer>
        <h4>Portfolios</h4>
        <h4>Desenvolvido para a criação de portifólios rápidos e simples.</h4>
    </footer>
</body>

</html>