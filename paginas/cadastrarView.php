<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/insertInformacoes.css">
    <title>Inserir informacoes</title>
    <script src="./js/Imagem.js" type="module"></script>
    <script src="./js/formulario.js" type="module"></script>


</head>

<body>
    <header class="header">
        <nav>
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
        </nav>
    </header>
    <main>
        <form action="/cadastrar.php" method="POST" enctype="multipart/form-data">
            <article>
                <div class="container" id="form1">
                    <h3>Insira as informações necessárias</h3>

                    <label class="campoLabel" for="nome">Nome</label><br>
                    <input type="text" id="name" name="nome"><br>

                    <label class="campoLabel" for="email">E-mail</label><br>
                    <input type="email" id="email" name="email"><br>

                    <label class="campoLabel" for="datadenascimento">Data de nascimento</label><br>
                    <input type="text" id="dataNascimento" name="dataNascimento"><br><br>

                    <center><button id="proximo" type="button">Próximo</button></center>

                </div>
            </article>
            <article>
                <div class="container animacao" id="form2">
                    <h3>Insira as informações necessárias</h3>
                    <label class="campoLabel" for="github">GitHub</label><br>
                    <input type="text" id="github" name="github"><br>

                    <label class="campoLabel" for="linkedin">LinkedIn</label><br>
                    <input type="text" id="linkedin" name="linkedin"><br>

                    <label class="campoLabel" for="datadenascimento">Sua foto</label><br>

                    <div class="imagem">
                        Foto <br>
                        <img src="" alt="" id="foto">
                        <input type="file" name="fotoPerfil" class="input" id="imagem">
                        <label for="imagem">Cadastrar Imagem</label>
                    </div>


                    <label class="campoLabel" for="portifolio">Sobre você e seus projetos</label><br>
                    <textarea id="portifolio" name="descricao" rows="4" cols="50"></textarea><br><br>
                    <div class="botoes">
                        <button id="voltar" type="button">Voltar</button>
                        <button type="submit">Enviar</button>
                    </div>
                </div>
        </form>
        </article>
    </main>

    <footer>
        <h4>Portfolios</h4>
        <h4>Desenvolvido para a criação de portifólios rápidos e simples.</h4>
    </footer>


</body>

</html>