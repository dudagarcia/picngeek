<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="javascript/home.js"></script>
    <script type="text/javascript" src="javascript/video.js"></script>

    <link rel="stylesheet" href="css/master.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/master.js"></script>
    <script type="text/javascript" src="javascript/voltaraotopo.js"></script>

    <?php
  session_start();
  if(isset($_SESSION['login'])){
    echo "<script>logado = true;document.getElementById('nomeLogin').innerHTML = '".$_SESSION['login']."'</script>";
  }
  ?>

    <div id="LoggedPopup">
        <p id="msgLog">Bem vindo!</p>
    </div>

    <div class="topMenu" onload="check()">
        <a id="logo" href="index.php"><img src="media/logo.png"></a>
        <div id="botoes">
            <a href="index.php" id="btnHome" style="background-color: black;
    color: white;"><b>HOME</b></a>
            <a href="produtos.php" id="btnProdutos"><b>PRODUTOS</b></a>
            <a href="nossaempresa.php" id="btnSobre"><b>SOBRE</b></a>
        </div>
        <div id="pesquisa">
            <form action="">
                <input id="txtPesquisa" type="text" placeholder="O que você procura?...">
                <a href="" id="btnPesquisa"><img src="media/pesquisa.png"></a>
            </form>
        </div>

        <div id="login">
            <a id="carrinho" onclick="">
                <div id="carrinhoOverlay"></div>
                <img src="media/carrinho.png">
            </a>

            <p id="nomeLogin"></p>

            <a id="userIMG" onclick="abreLogin()">
                <div id="userOverlay"></div>
                <img src="media/deslogado.png" class="imgLogin">
            </a>
        </div>
        <div id="loginPopUp">
            <form id="frmLogin" action="verificaLogin.php" method="post">
                <b>LOGIN</b><br>
                <label for="login">login:</label>
                <input type="text" id="login" name="login"><br>
                <label for="senha">senha:</label>
                <input type="password" id="senha" name="senha">
                <a href="cadastro.php">Ainda não sou cliente</a><br>
                <a href="">Esqueci minha senha</a>
                <input type="submit" value="Enviar" name="submit">
                <input type="reset" value="Redefinir">
            </form>
            <div id="divLogado">
                <a id="btnConta" href="seusdados.php">Sua conta</a><br><br>
                <a id="btnSair" href="sair.php">Sair</a>
            </div>
        </div>
    </div>


</head>

<body onload="mostraSlide(slideMarcador);slideTimer()">

    <div class="mae" id="section1">

        <div class="caixa-flex">
            <div id="vitrine">
                <a class="setaAnte" onclick="mudaSlide(-1)">&#10094;</a>
                <a class="setaProx" onclick="mudaSlide(+1)">&#10095;</a>
                <img src="media/slider4.jpg" class="slide deslizaChega">
                <img src="media/slider5.jpg" class="slide deslizaChega">
                <img src="media/slider6.jpg" class="slide deslizaChega">
            </div>

            <div id="caixa-imagens">
                <div id="imagem12">
                    <div class="container">
                        <img src="media/series.jpg" style="width:100%" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h1>Séries</h1>
                                <p>Só mais um episódio...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="imagem11">
                    <div class="container">
                        <img src="media/filmes.jpg" alt="Avatar" style="width:100%" class="image">
                        <div class="overlay">
                            <div class="text">
                                <h1>Filmes</h1>
                                <p>Os maiores sucessos do cinema em cartaz agora nas paredes da sua casa!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="imagem21">
                    <div class="container">
                        <img src="media/musica.jpg" alt="Avatar" style="width:100%" class="image">
                        <a class="overlay">
                            <div class="text">
                                <h1>Música</h1>
                                <p>Aumenta o som e vem conferir nossa playlist especial de pôsteres</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div id="video22" href="produtos.html">
                    <div id="caixa-video">
                        <div class="content">
                            <h1>DIY: Pôster luminoso</h1>
                            <p>Aperte o play e aprenda a fazer seu próprio pôster luminoso</p>
                        </div>
                        <div id="myVideo">
                            <iframe width="750" height="380" src="https://www.youtube.com/embed/MH6NVv-CAWg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.html" ?>

        </div>

    </div>
</body>

</html>
