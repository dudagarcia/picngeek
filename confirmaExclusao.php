<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pic N Geek</title>
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.ico" />
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <link rel="stylesheet" href="css/master.css">
    <?php include "header.php" ?>
</head>

<body>

    <center>
        <div class="mae" id="section1">


            <div class="container">
                <div id="tamanhopagina">
                <h1>Exclusão</h1>
                <hr>
                <?php
        include "conexao.php";
        session_start();
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }
        
        $login = $_SESSION['login'];
        $senha = $_SESSION['senha'];
            
        $sql4="select * from usuario where login = '{$login}' and senha = '{$senha}' and excluido='n';";
        $resultado4=pg_query($sql4);
        $linha4=pg_num_rows($resultado4);
        $linha44=pg_fetch_array($resultado4);
        $id=$linha44['id_usuario'];
        
        echo "<h2>Deseja excluir seus dados?</h2> <p>Sem seus dados cadastrais, você não podera mais realizar compras.</p> ";
        echo "<a class='alterar' href='exclusao.php?id_usuario=$linha[0]'>Sim</a>";
        echo "<a class='excluir' href='index.php'>Não</a>";
        
   ?>
            </div>
            </div>

            <?php include "footer.html" ?>
        </div>
    </center>
</body>

</html>
