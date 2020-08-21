<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
    <link rel="stylesheet" type="text/css" href="css/sobre.css">
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
            <a href="index.php" id="btnHome"><b>HOME</b></a>
            <a href="produtos.php" id="btnProdutos"><b>PRODUTOS</b></a>
            <a href="nossaempresa.php" id="btnSobre" style="background-color: black;
    color: white;"><b>SOBRE</b></a>
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
                <a id="btnSair"  href="sair.php">Sair</a>
            </div>
        </div>
    </div>


</head>

<body>


    <center>
        <div class="mae" id="section1">

            <div id="emcima">
                <div class="card">
                    <img src="media/clara.png" class="ftgrupo" alt="Avatar" style="width:150px">
                    <div class="container">
                        <h4><b>Clara Julia Lima Salmaso</b></h4>
                        <p>N°06</p>
                        <p>72B</p>
                        <p>(14) 99636-4470</p>
                        <p>clarajlsalmaso@gmail.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="media/gustavo.png" class="ftgrupo" alt="Avatar" style="width:150px">
                    <div class="container">
                        <h4><b>Gustavo Motta Cabello dos Santos</b></h4>
                        <p>N°14</p>
                        <p>72B</p>
                        <p>(14) 99611-2833</p>
                        <p>cabellogustavo01@gmail.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="media/hugo.png" class="ftgrupo" alt="Avatar" style="width:150px">
                    <div class="container">
                        <h4><b>Hugo Ferreira Gabriel Vieira</b></h4>
                        <p>N°15</p>
                        <p>72B</p>
                        <p>(14) 99855-0515</p>
                        <p>huugo.vieira49@gmail.com</p>
                    </div>
                </div>

            </div>
            <div id="embaixo">
                <div class="card">
                    <img src="media/jesus.png" class="ftgrupo" alt="Avatar" style="width:150px">
                    <div class="container">
                        <h4><b>João Guedes Wanderley</b></h4>
                        <p>N°16</p>
                        <p>72B</p>
                        <p>(14) 99109-3124</p>
                        <p>jotagw@gmail.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="media/duda.png" class="ftgrupo" alt="Avatar" style="width:150px">
                    <div class="container">
                        <h4><b>Maria Eduarda Rodrigues Garcia</b></h4>
                        <p>N°27</p>
                        <p>72B</p>
                        <p>(14) 99890-3794</p>
                        <p>mariaedrgarcia@gmail.com</p>
                    </div>
                </div>

            </div>

            <?php include "footer.html" ?>
        </div>
    </center>
</body>

</html>
