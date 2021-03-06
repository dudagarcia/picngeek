<title>Pic N Geek</title>
<link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />

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
            <a id="btnSair"  href="sair.php">Sair</a>
        </div>
    </div>
</div>
