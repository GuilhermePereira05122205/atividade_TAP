<?php


use Projeto\Database\Conexao;

require_once("../vendor/autoload.php");

$conexao = new Conexao();

$conexao = $conexao->conectar();

$query = $conexao->prepare("SELECT * FROM portifolios");

$query->execute();


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <nav>
            <ul>
                <li>Listar Portifolio</li>
                <li>Criar portifolio</li>
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
                        <img src="" alt="">
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
                            <img src="./img/github.png" alt="">
                        </div>
                        <div>
                            <img src="./img/edit.png" alt="">
                        </div>
                        <div>
                            <img src="./img/linkedin.png" alt="">
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